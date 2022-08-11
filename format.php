<?php 

class Format{
    public function formatDate($date)
       {return date('F j, Y, g:i:a',strtotime($date));}

       public function textShorten($text,$limit=400)
       {
        $text=$text." ";
        $text=substr($text,0,$limit);
        $text=substr($text,0,strrpos($text,' ')); ////this lin for to show the last full word.
        $text=$text."....";
        return $text;   
       }
       public function validation($data)
       {
       $data=trim($data);
       $data=stripcslashes($data);
       $data=htmlspecialchars($data);
       return $data;
       }

      public function title()
      {
        $path=$_SERVER['SCRIPT_FILENAME'];    ///path taa dora hoice.
        $title=basename($path,'.php');        ///path theke php file gula newa holo.
        if($title=='index')                    ///determine the php file.
        {
          $title='home';   
        }
        else if($title=='contact')
        {
         $title='contact';   
        }

        return $title=ucwords($title);                  ////ucwords() upercase the each first word of sentence.
      } 
}
?>