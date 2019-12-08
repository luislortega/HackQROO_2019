<?php
function paginate($page, $tpages, $adjacents) {
	$prevlabel = "&lsaquo; Anterior ";
	$nextlabel = " Siguiente &rsaquo;";
	$out = '<nav aria-label="Page navigation example"> <ul class="pagination   pull-right">';
	
	// previous label

	if($page==1) {
		$out.= " ";
		$out.= " <li class='page-item disabled'> <a class='page-link'> $prevlabel </a> </li> ";
	} else if($page==2) {
		$out.= " ";
		$out.= " <li class='page-item'> <a class='page-link' href='javascript:void(0);' onclick='load(1)'> $prevlabel </a> </li> ";
	}else {
		$out.= " ";
		$out.= " <li class='page-item'> <a class='page-link' href='javascript:void(0);' onclick='load(".($page-1).")'> $prevlabel </a> </li> ";

	}
	
	// first label
	if($page>($adjacents+1)) {
		$out.= " ";
		$out.= " <li class='page-item'> <a class='page-link'  href='javascript:void(0);' onclick='load(1)'> 1 </a> </li> ";
		$out.= " ";
	}
	// interval
	if($page>($adjacents+2)) {
		$out.= " ";
		$out.= " <li class='page-item'> <a class='page-link' >...</a> </li> ";
		$out.= " ";
	}

	// pages

	$pmin = ($page>$adjacents) ? ($page-$adjacents) : 1;
	$pmax = ($page<($tpages-$adjacents)) ? ($page+$adjacents) : $tpages;
	for($i=$pmin; $i<=$pmax; $i++) {
		if($i==$page) {
			$out.= " ";
			$out.= " <li class='active page-item'> <a class='page-link' >$i</a></li> ";
		}else if($i==1) {
			$out.= " ";
			$out.= " <li class='page-item'> <a class='page-link'  href='javascript:void(0);' onclick='load(1)'> $i </a> </li> ";
		}else {
			$out.= " ";
			$out.= " <li class='page-item'> <a class='page-link'  href='javascript:void(0);' onclick='load(".$i.")'> $i </a> </li> ";
		}
	}

	// interval

	if($page<($tpages-$adjacents-1)) {
		$out.= " ";
		$out.= " <li class='page-item'> <a class='page-link' >...</a> </li> ";
	}

	// last

	if($page<($tpages-$adjacents)) {
		$out.= " ";
		$out.= " <li class='page-item'> <a class='page-link'  href='javascript:void(0);' onclick='load($tpages)'> $tpages </a> </li> ";
	}

	// next

	if($page<$tpages) {
		$out.= " ";
		$out.= " <li class='page-item'> <a class='page-link'  href='javascript:void(0);' onclick='load(".($page+1).")'> $nextlabel </a> </li> ";
	}else {
		$out.= " ";
		$out.= " <li class='disabled page-item'> <a class='page-link' > $nextlabel </a> </li> ";
	}
	
	$out.= "</ul> </nav>";
	return $out;
}
?>
