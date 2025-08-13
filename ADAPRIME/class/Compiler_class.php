<?php

    class Compiler_class{
        public function compile($program, $output){
            //$program = $username.$level.$qno.".c";
            //$program = "/home/cppxaxa/Desktop/sandbox/clean.c";
            //$output = "/home/cppxaxa/Desktop/sandbox/abhinavcheck.out";
            if(file_exists($output)){
                unlink($output);
            }
            $path = "gcc ".$program." -o ".$output." -lm";
            shell_exec($path);
            
            //unlink($program);
            return file_exists($output);
            //echo $output;
        }   
    }
    $Compiler = new Compiler_class();
    //$Compiler->compile("/home/cppxaxa/Desktop/sandbox/clean.c", "/home/cppxaxa/Desktop/sandbox/abhinavcheck.out");

?>