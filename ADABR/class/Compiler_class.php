<?php

    class Compiler_class{
        public function compile($program, $output){
            //$program = $username.$level.$qno.".c";
            //$program = "/home/cppxaxa/Desktop/sandbox/clean.c";
            //$output = "/home/cppxaxa/Desktop/sandbox/abhinavcheck.out";
            unlink($output);
            
            $path = "gcc ".$program." -o ".$output;
            //echo $path;
            shell_exec($path);
            
            return file_exists($output);
            //echo $output;
        }   
    }
    $Compiler = new Compiler_class();
    //$Compiler->compile("/home/cppxaxa/Desktop/sandbox/clean.c", "/home/cppxaxa/Desktop/sandbox/abhinavcheck.out");

?>