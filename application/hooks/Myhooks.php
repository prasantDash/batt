<?php
class Myhooks{
	public function myName(){
		// load the instance
		$this->CI =& get_instance();

		// get the actual output
		$contents = $this->CI->output->get_output();

		// replace the tokens
		$contents = str_replace("Page", "", $contents);
		echo $contents;
		return;
	}
}