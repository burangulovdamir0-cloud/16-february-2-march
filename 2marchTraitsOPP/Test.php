<?php
	class test
	{
        use trait1;
		use trait2; 
		use trait3;
		public function __construct()
		{
			echo $this->method1(); 
			echo $this->method2(); 
			echo $this->method3(); 
		}
	}
    $test = new Test();
echo $test->getSum();
?>
