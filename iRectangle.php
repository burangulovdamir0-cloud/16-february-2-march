<?php
	interface iRectangle
	{
		public function __construct($a, $b); / 
		public function getSquare();
		public function getPerimeter();
	}
?>

<?php
	interface iRectangle extends iFigure
	{
		public function __construct($a, $b);
	}
?>