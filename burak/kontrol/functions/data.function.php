<?php
    header('Content-Type: text/html; charset=utf-8');
    
    function Connect(){
        $host = "localhost";
        $user = "root";
        $pass = "";
        $data = "burak";
        $Con = @mysql_connect($host, $user, $pass);
        if(!$Con){
            die("Server Bağlantısı Yapılamadı !");
        }
        else{
            $DB = @mysql_select_db($data, $Con);
            if(!$DB){
                die("Veritabanı Seçilemedi !");
            }
            else{
                @mysql_query("SET CHARACTER  SET utf8");
                @mysql_query("SET character_set_connection = 'UTF8' ");
                @mysql_query("SET character_set_clients = 'UTF8' ");
                @mysql_query("SET character_set_results = 'UTF8' ");
            }
            return $Con;
        }
    }

    function DisConnect(){
        if(!mysql_close(Connect())){
            die("Bağlantı Kapatılamadı !");
        }
        else{
            return true;
        }
    }

    function Sor($sql){
        global $Hata;
        if(isset($sql)){
            if(Connect()){
                $sonuc = @mysql_query($sql);
                $Hata = mysql_error();
                DisConnect();
                return $sonuc;
            }
        }
    }
    
    function Say($par){
        return @mysql_num_rows($par);
    }
    
    function Yaz($par){
        return @mysql_fetch_assoc($par);
    }