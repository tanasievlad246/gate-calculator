<?php
if (isset($_POST['calculeaza'])) {
include './src/includes/header.php';
include './src/classes/ConstructorPoarta.php';

$constructor_poarta = new ConstructorPoarta();
$poarta = $constructor_poarta->{$_POST['select_poarta']}(1800,1000,3000);

echo <<<EOT

<div class="row">
    <img src="./src/public/assets/{$_POST['select_poarta']}.jpg">
</div>

<div class="text-center row">
<div>
<h3>Poarta pietonala</h3>
<table class="tg center">
<thead>
  <tr>
    <th class="tg-baqh" colspan="5">
        {$poarta['nume']}, L: {$poarta['poarta_pietonala']['latime_neta']} H: {$poarta['inaltime']} / L: {$poarta['poarta_pietonala']['latime']} H: {$poarta['inaltime']} 
    </th>
  </tr>
</thead>
<tbody>
  <tr>
    <td class="tg-0lax">Material</td>
    <td class="tg-0lax">Dimensiuni</td>
    <td class="tg-0lax">Bucatii</td>
    <td class="tg-0lax">Grad taiere</td>
    <td class="tg-0lax">Total material</td>
  </tr>
  <tr>
    <td class="tg-0lax">{$poarta['elemente_interioare']['spec_element_mic']['nume']}</td>
    <td class="tg-0lax">{$poarta['poarta_pietonala']['latime_interior']}</td>
    <td class="tg-0lax">{$poarta['elemente_interioare']['total_material_elemente']['poarta_pietonala']['total_elemente_mici']}</td>
    <td class="tg-0lax">{$poarta['elemente_interioare']['spec_element_mic']['grad_taiere']}</td>
    <td class="tg-0lax">{$poarta['elemente_interioare']['total_material_elemente']['poarta_pietonala']['material_elemente_mici']}</td>
  </tr>
  <tr>
    <td class="tg-0lax">{$poarta['elemente_interioare']['spec_element_mare']['nume']}</td>
    <td class="tg-0lax">{$poarta['poarta_pietonala']['latime_interior']}</td>
    <td class="tg-0lax">{$poarta['elemente_interioare']['total_material_elemente']['poarta_pietonala']['total_elemente_mari']}</td>
    <td class="tg-0lax">{$poarta['elemente_interioare']['spec_element_mare']['grad_taiere']}</td>
    <td class="tg-0lax">{$poarta['elemente_interioare']['total_material_elemente']['poarta_pietonala']['material_elemente_mari']}</td>
  </tr>
  <tr>
    <td class="tg-0lax">{$poarta['spec_elemente_cadru']['nume']}</td>
    <td class="tg-0lax">{$poarta['poarta_pietonala']['latime_neta']}</td>
    <td class="tg-0lax">2</td>
    <td class="tg-0lax">{$poarta['spec_elemente_cadru']['grad_taiere']}</td>
    <td class="tg-0lax">{$poarta['poarta_pietonala']['total_material']['orizontala']}</td>
  </tr>
  <tr>
    <td class="tg-0lax">{$poarta['spec_elemente_cadru']['nume']}</td>
    <td class="tg-0lax">{$poarta['inaltime']}</td>
    <td class="tg-0lax">2</td>
    <td class="tg-0lax">{$poarta['spec_elemente_cadru']['grad_taiere']}</td>
    <td class="tg-0lax">{$poarta['poarta_pietonala']['total_material']['verticala']}</td>
  </tr>
</tbody>
</table>
</div>

<div>
<h3>Poarta Auto</h3>
<table class="tg center">
<thead>
  <tr>
    <th class="tg-baqh" colspan="5">
        {$poarta['nume']}, L: {$poarta['poarta_auto']['latime_neta']} H: {$poarta['inaltime']} / L: {$poarta['poarta_auto']['latime']} H: {$poarta['inaltime']} 
    </th>
  </tr>
</thead>
<tbody>
  <tr>
    <td class="tg-0lax">Material</td>
    <td class="tg-0lax">Dimensiuni</td>
    <td class="tg-0lax">Bucatii</td>
    <td class="tg-0lax">Grad taiere</td>
    <td class="tg-0lax">Total material</td>
  </tr>
  <tr>
    <td class="tg-0lax">{$poarta['elemente_interioare']['spec_element_mic']['nume']}</td>
    <td class="tg-0lax">{$poarta['poarta_auto']['latime_interior']}</td>
    <td class="tg-0lax">{$poarta['elemente_interioare']['total_material_elemente']['poarta_auto']['total_elemente_mici']}</td>
    <td class="tg-0lax">{$poarta['elemente_interioare']['spec_element_mic']['grad_taiere']}</td>
    <td class="tg-0lax">{$poarta['elemente_interioare']['total_material_elemente']['poarta_auto']['material_elemente_mici']}</td>
  </tr>
  <tr>
    <td class="tg-0lax">{$poarta['elemente_interioare']['spec_element_mare']['nume']}</td>
    <td class="tg-0lax">{$poarta['poarta_auto']['latime_interior']}</td>
    <td class="tg-0lax">{$poarta['elemente_interioare']['total_material_elemente']['poarta_auto']['total_elemente_mari']}</td>
    <td class="tg-0lax">{$poarta['elemente_interioare']['spec_element_mare']['grad_taiere']}</td>
    <td class="tg-0lax">{$poarta['elemente_interioare']['total_material_elemente']['poarta_auto']['material_elemente_mari']}</td>
  </tr>
  <tr>
    <td class="tg-0lax">{$poarta['spec_elemente_cadru']['nume']}</td>
    <td class="tg-0lax">{$poarta['poarta_auto']['latime_neta']}</td>
    <td class="tg-0lax">2</td>
    <td class="tg-0lax">{$poarta['spec_elemente_cadru']['grad_taiere']}</td>
    <td class="tg-0lax">{$poarta['poarta_auto']['total_material']['orizontala']}</td>
  </tr>
  <tr>
    <td class="tg-0lax">{$poarta['spec_elemente_cadru']['nume']}</td>
    <td class="tg-0lax">{$poarta['inaltime']}</td>
    <td class="tg-0lax">2</td>
    <td class="tg-0lax">{$poarta['spec_elemente_cadru']['grad_taiere']}</td>
    <td class="tg-0lax">{$poarta['poarta_auto']['total_material']['verticala']}</td>
  </tr>
</tbody>
</table>
</div>
</div>
EOT;

include './src/includes/footer.php';
} else {
    header('Location: ./error.php');
    exit();
}