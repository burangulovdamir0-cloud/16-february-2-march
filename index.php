<?php
	$figuresCollection = new FiguresCollection;
	$figuresCollection->add(new Quadrate(2));
	$figuresCollection->add(new Quadrate(3));
	$figuresCollection->add(new Rectangle(2, 3));
	$figuresCollection->add(new Rectangle(3, 4));
?>

<?php
	$quadrate = new Quadrate;
	
	var_dump($quadrate instanceof 
		Quadrate); 
	var_dump($quadrate instanceof 
		Figure); 
?>