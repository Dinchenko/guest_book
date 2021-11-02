<?php
    function save_mess(){
        $name = $_POST['name'];
        $text = $_POST['text'];
        $str = $name . '|' . $text . '|' . date('Y-m-d H:i:s') . "\n***\n" ;
    file_put_contents('gb.txt', $str, FILE_APPEND);
    }
    function get_mess(){
        $messages = file_get_contents('gb.txt');
        if ($messages = explode("\n***\n", $messages)) {
            array_pop($messages);
            return array_reverse($messages);
        }
    }
    function get_format_message($message){
        return explode('|', $message);
    }
    function print_arr($array){
        print_r ($array, true);
    }
?>
