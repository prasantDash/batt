<?php
class ReplaceToken {
  public function replacePlaceholderCode()
  {
      // load the instance
      $this->CI =& get_instance();
       
      // get the actual output
      $contents = $this->CI->output->get_output();
       
      // replace the tokens
      $contents = str_replace("CodeIgniter", "CodeIgniter_11", $contents);
       
      // set the output
      echo $contents;
      return;
  }
}