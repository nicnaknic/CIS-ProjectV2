<?php
class Zipper{
    private $_files = array(), $_zip;

    public function __construct(){
        $this->_zip = new ZipArchive;
    }

    public function add($input){
        if(is_array($input)){
            $this->_files = array_merge($this->_files, $input);
        }else{
            $this->_files[] = $input;
        }
    }

    public function store($location = null){ //used for storing the files added from the directory
        if(count($this->_files) && $location){
            foreach($this->_files as $index => $file){
                if(!file_exists($file)){
                    unset($this->_files[$index]);
                }
                elseif(preg_match('/.zip$/', $file)){ //if the file was already compressed once, remove it from the array of files to zip
                    unset($this->_files[$index]);
                }
            }

            if($this->_zip->open($location, file_exists($location) ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE)){ //create the .ZIP; if it exists overwrite, else create it
            
                foreach($this->_files as $file){
                    $this->_zip->addFile($file); //for each file in our array add it to the zip
                }

                $this->_zip->close(); //close the zip once completed
            }
        }
    }   
}