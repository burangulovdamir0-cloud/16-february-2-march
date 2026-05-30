<?php
	class FiguresCollection1
	{
		private $figures = [];
		
		public function addFigure($figure)
		{
			$this->figures[] = $figure;
		}
		
	
		public function getTotalSquare()
		{
			$sum = 0;
			
			foreach ($this->figures as $figure) {
				$sum += $figure->getSquare(); 

			}
			
			return $sum;
		}
	}
?>

<?php
class FiguresCollection
{
    private array $figures = [];
    public function addFigure(object $figure): void
    {
        $this->figures[] = $figure;
    }
    public function getTotalPerimeter(): float
    {
        $total = 0.0;
        foreach ($this->figures as $figure) {
            if (method_exists($figure, 'getPerimeter')) {
                $total += $figure->getPerimeter();
            }
        }
        return $total;
    }
}
?>