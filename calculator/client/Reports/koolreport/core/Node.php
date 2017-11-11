<?php
/**
 * This file contains foundation class for legos-like structure of KoolReport
 *
 * @author KoolPHP Inc (support@koolphp.net)
 * @link https://www.koolphp.net
 * @copyright 2008-2017 KoolPHP Inc
 * @license https://www.koolreport.com/license#mit-license
 */

namespace koolreport\core;

class Node extends Base
{
	protected $sources;	
	protected $destinations;
	protected $is_ended=false;
	protected $metaData;
	protected $streamingSource;
	
	public function __construct()
	{
		parent::__construct();
		$this->sources = array();
		$this->destinations = array();
		$this->metaData = array();
	}
		
	public function pipe($node)
	{
		if(gettype($node)=="array")
		{
			foreach($node as $nd)
			{
				array_push($this->destinations,$nd);
				$nd->source($this);
			}
			return $node;//Return array of node
		}
		else
		{
			array_push($this->destinations,$node);
			$node->source($this);
			return $node;			
		}
	}

	public function previous($index=0)
	{
		if(count($this->sources)>0)
		{
			return $this->sources[$index];
		}
		return null;
	}
	
	public function saveTo(&$self)
	{
		$self = $this;
		return $this;
	}
	
	public function source($source)
	{
		//The one that forward data to.
		array_push($this->sources,$source);
	}
	
	public function meta()
	{
		return $this->metaData;
	}
	
	public function next($data)
	{
		if($this->destinations!=null)
		{
			foreach($this->destinations as $node)
			{
				$node->input($data,$this);
			}			
		}
	}
  
	public function startInput($source)
	{
		$this->streamingSource = $source;
		$this->is_ended = false;
		$this->onInputStart();
		foreach($this->destinations as $node)
		{
			$node->startInput($this);
		}			
	}
	
	protected function onInputStart()
	{

	}

	public function input($data,$source)
	{
		$this->streamingSource = $source;
		$this->onInput($data);
	}
	
	protected function onInput($data)
	{
		$this->next($data);
	}	
	public function endInput($source)
	{
		$this->streamingSource = $source;
		$sourceAllEnded = true;
		foreach($this->sources as $src)
		{
			$sourceAllEnded &= $src->isEnded();
		}
		if($sourceAllEnded)
		{
			$this->is_ended = true;
			$this->onInputEnd();
			foreach($this->destinations as $node)
			{
				$node->endInput($this);
			}			
		}
	}
	
	protected function onInputEnd()
	{

	}
	public function isEnded()
	{
		return $this->is_ended;
	}
		
	protected function sendMeta($metaData)
	{
		foreach($this->destinations as $node)
		{
			$node->receiveMeta($metaData,$this);
		}					
	}
	public function receiveMeta($metaData,$source)
	{
		$this->streamingSource = $source;
		$this->metaData = $metaData;
		$metaData = $this->onMetaReceived($metaData);
		$this->sendMeta($metaData);
	}
	protected function onMetaReceived($metaData)
	{
		return $metaData;		
	}
	
	public function getReport()
	{
		if(isset($this->sources[0]))
		{	
			return $this->sources[0]->getReport();
		}
		return null;
	}	
}