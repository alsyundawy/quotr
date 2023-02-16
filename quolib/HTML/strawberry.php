<!-- (A) HEADER -->
<table id="company"><tr>
	<td>
		<img src="<?=$this->company[0]?>">
	  <div id="co-left"><?php
		for ($i=2; $i<count($this->company); $i++) {
			echo "<div>{$this->company[$i]}</div>";
		}
		?></div>
  </td>
	<td id="co-right">
		<div>QUOTATION</div>
	</td>
</tr></table>

<!-- (B) CUSTOMER & INFO -->
<table id="customer"><tr>
	<td>
		<strong class="pink">CUSTOMER</strong><br>
		<?php foreach ($this->customer as $c) { echo "$c<br>"; } ?>
  </td>
	<td>
		<?php foreach ($this->head as $i) { echo "<strong class='pink'>{$i[0]}:</strong> {$i[1]}<br>"; } ?>
	</td>
</tr></table>

<!-- (C) ITEMS & TOTALS -->
<table id="items">
	<tr><th>Item</th><th>Quantity</th><th>Unit Price</th><th>Amount</th></tr>
	<?php
	foreach ($this->items as $i) {
		echo "<tr><td><div>{$i[0]}</div>";
		if ($i[1]!="") { echo "<small class='idesc'>{$i[1]}</small>"; }
		echo "</td><td>{$i[2]}</td><td>{$i[3]}</td><td>{$i[4]}</td></tr>";
	}
	if (count($this->totals)>0) { foreach ($this->totals as $t) {
		echo "<tr class='ttl'><td class='right' colspan='3'>{$t[0]}</td><td>{$t[1]}</td></tr>";
	}}
	?>
</table>

<!-- (D) NOTES -->
<?php if (count($this->notes)>0) { ?>
<div id="notes">
<?php foreach ($this->notes as $n) { echo "$n<br>";} ?>
</div>
<?php } ?>

<!-- (E) ACCEPTANCE -->
<?php if ($this->accept) { ?>
<div id="accept">
	Customer Acceptance
	<table><tr>
		<td>Signature</td><td>Name</td><td>Date</td>
	</tr></table>
</div>
<?php } ?>