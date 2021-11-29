<?php
// (A) THE TABLE STYLE
$tableStyle = [
	"width" => 5000,
	"unit" => "pct",
	"alignment" => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER
];

// (B) COMPANY
$section = $pw->addSection();
$table = $section->addTable($tableStyle);
$cell = $table->addRow()->addCell(2500);
$cell->addImage($this->company[1], ["width"=>120]);
$cell = $table->addCell(2500);
for ($i=2;$i<count($this->company);$i++) {
	$cell->addText($this->company[$i], [], [
		"spaceAfter" => 0,
		"alignment" => \PhpOffice\PhpWord\SimpleType\Jc::RIGHT]
	);
}

// (C) BIG QUOTATION
$section->addText("QUOTATION",
	["color"=>"ad132f", "bold"=>true, "size"=>20],
	["spaceAfter" => 500, "spaceBefore"=>500]);

// (D) CUSTOMER
$table = $section->addTable($tableStyle);
$cell = $table->addRow()->addCell(2500);
$cell->addText("CUSTOMER",["bold"=>true],["spaceAfter" => 0, "spaceBefore"=>0]);
foreach ($this->customer as $c) {
	$cell->addText($c,[],["spaceAfter" => 0, "spaceBefore"=>0]);
}

// (E) QUOTATION INFO
$cell = $table->addCell(2500);
foreach ($this->head as $i) {
	$textrun = $cell->addTextRun(["spaceAfter" => 0, "spaceBefore"=>0]);
	$textrun->addText($i[0].": ",["bold"=>true]);
	$textrun->addText($i[1]);
}

// (F) ITEMS
$section->addText(" ",[],["spaceBefore"=>500]);
$style = [
	"borderBottomSize" => 18, "borderBottomColor" => "000000",
	"borderTopSize" => 18, "borderTopColor" => "000000"
];
$table = $section->addTable($tableStyle);
$table->addRow();
$cell = $table->addCell(2000, $style);
$cell->addText("Item",["bold"=>true]);
$cell = $table->addCell(1000, $style);
$cell->addText("Quantity",["bold"=>true]);
$cell = $table->addCell(1000, $style);
$cell->addText("Unit Price",["bold"=>true]);
$cell = $table->addCell(1000, $style);
$cell->addText("Amount",["bold"=>true]);
$style = ["borderBottomSize" => 10, "borderBottomColor" => "EEEEEE"];
foreach ($this->items as $i) {
	$table->addRow();
	$cell = $table->addCell(2000, $style);
	$cell->addText($i[0]);
	if ($i[1]!="") { $cell->addText($i[1],["size"=>9,"color"=>"999999"]); }
	$cell = $table->addCell(1000, $style);
	$cell->addText($i[2]);
	$cell = $table->addCell(1000, $style);
	$cell->addText($i[3]);
	$cell = $table->addCell(1000, $style);
	$cell->addText($i[4]);
}

// (G) TOTALS
$style = ["borderBottomSize" => 10, "borderBottomColor" => "EEEEEE", "bgcolor"=>"FAFAFA"];
if (count($this->totals)>0) { foreach ($this->totals as $t) {
	$table->addRow();
	$cell = $table->addCell(4000, array_merge($style, ["gridSpan" => 3]));
	$cell->addText($t[0], ["bold"=>true]);
	$cell = $table->addCell(1000, $style);
	$cell->addText($t[1], ["bold"=>true]);
}}

// (H) NOTES
if (count($this->notes)>0) {
	$section->addText(" ");
	$style = ["bgcolor"=>"FAFAFA"];
	$table = $section->addTable($tableStyle);
	$cell = $table->addRow()->addCell(5000, $style);
	foreach ($this->notes as $n) {
		$cell->addText($n);
	}
}

// (I) ACCEPTANCE
if ($this->accept) {
	$section->addText(" ");
	$section->addText("Customer Acceptance");
	$table = $section->addTable([
		"width" => 5000,
		"unit" => "pct"
	]);
	$style = [
		"borderTopSize" => 15,
		"borderBottomSize" => 15,
		"borderLeftSize" => 15,
		"borderRightSize" => 15,
		"borderTopColor" => "BBBBBB",
		"borderBottomColor" => "BBBBBB",
		"borderLeftColor" => "BBBBBB",
		"borderRightColor" => "BBBBBB"
	];
	$cell = $table->addRow()->addCell(1667, $style);
	$cell->addText("Signature",["color"=>"#a5a5a5"],["spaceAfter" => 1000]);
	$cell = $table->addCell(1667, $style);
	$cell->addText("Name",["color"=>"#a5a5a5"],["spaceAfter" => 1000]);
	$cell = $table->addCell(1666, $style);
	$cell->addText("Date",["color"=>"#a5a5a5"],["spaceAfter" => 1000]);
}
