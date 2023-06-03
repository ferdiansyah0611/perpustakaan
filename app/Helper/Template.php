<?php

namespace App\Helper;

class Template {

	public $title;
	public $option;
	public $breadcrumb = array();
	public $field = array();
	public $row = array();
	public $action_start;
	public $action_end;

	public function __construct($title)
	{
		$this->title = $title;
	}

	public function make_bread($name, $url)
	{
		array_push($this->breadcrumb, array('name' => $name, 'url' => $url));
		return $this;
	}

	public function make_field($name, $key, $option = null)
	{
		array_push($this->field, array('name' => $name, 'key' => $key, 'option' => $option));
		return $this;
	}

	public function set_row($arr)
	{
		$this->row = $arr;
		return $this;
	}

	public function set_route($name)
	{
		$this->option['route'] = $name;
		return $this;
	}
	public function set_option($key, $value)
	{
		$this->option[$key] = $value;
		return $this;
	}

}