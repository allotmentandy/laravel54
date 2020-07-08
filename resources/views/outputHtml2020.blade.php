
<p>Londinium.com is a new London website directory. We are trying to make the most useful link directory for Londoners and people visiting London. Now with Facebook, Twitter, Instagram and LinkedIn links :)</p>

<h1>Travel</h1>
<?php
$subcat = 0;
?>
@foreach ($Travel as $site)
<?php
if ($site->subcategory_id != $subcat) {
    echo "<h4>" . $subcategories[$site->subcategory_id] . "</h4>";
    $subcat = $site->subcategory_id;
}
?>
<a href="{{ $site->url }}" target="_blank" class="link">{{ $site->name }}</a>
@if (isset($twitter[$site->id]))
<a href="{{$twitter[$site->id] }}" target="_blank"><img src="twitter.svg" alt="twitter" class="inline-block h-4 w-4"></a>
@endif
@if (isset($facebook[$site->id]))
<a href="{{$facebook[$site->id] }}" target="_blank"><img src="facebook.svg" alt="facebook" class="inline-block h-4 w-4"></a>
@endif
@if (isset($instagram[$site->id]))
<a href="{{$instagram[$site->id] }}" target="_blank"><img src="instagram.svg" alt="instagram" class="inline-block h-4 w-4"></a>
@endif
@if (isset($linkedin[$site->id]))
<a href="{{$linkedin[$site->id] }}" target="_blank"><img src="linkedin.svg" alt="linkedin" class="inline-block h-4 w-4"></a>
@endif
<br> @endforeach

<h1>Tourism</h1>
<?php
$subcat = 0;
?>
@foreach ($Tourism as $site)
<?php
if ($site->subcategory_id != $subcat) {
    echo "<h4>" . $subcategories[$site->subcategory_id] . "</h4>";
    $subcat = $site->subcategory_id;
}
?>
<a href="{{ $site->url }}" target="_blank" class="link">{{ $site->name }}</a>
@if (isset($twitter[$site->id]))
<a href="{{$twitter[$site->id] }}" target="_blank"><img src="twitter.svg" alt="twitter" class="inline-block h-4 w-4"></a>
@endif
@if (isset($facebook[$site->id]))
<a href="{{$facebook[$site->id] }}" target="_blank"><img src="facebook.svg" alt="facebook" class="inline-block h-4 w-4"></a>
@endif
@if (isset($instagram[$site->id]))
<a href="{{$instagram[$site->id] }}" target="_blank"><img src="instagram.svg" alt="instagram" class="inline-block h-4 w-4"></a>
@endif
@if (isset($linkedin[$site->id]))
<a href="{{$linkedin[$site->id] }}" target="_blank"><img src="linkedin.svg" alt="linkedin" class="inline-block h-4 w-4"></a>
@endif
<br> @endforeach

<h1>Food</h1>
<?php
$subcat = 0;
?>
@foreach ($Food as $site)
<?php
if ($site->subcategory_id != $subcat) {
    echo "<h4>" . $subcategories[$site->subcategory_id] . "</h4>";
    $subcat = $site->subcategory_id;
}
?>
<a href="{{ $site->url }}" target="_blank" class="link">{{ $site->name }}</a>
@if (isset($twitter[$site->id]))
<a href="{{$twitter[$site->id] }}" target="_blank"><img src="twitter.svg" alt="twitter" class="inline-block h-4 w-4"></a>
@endif
@if (isset($facebook[$site->id]))
<a href="{{$facebook[$site->id] }}" target="_blank"><img src="facebook.svg" alt="facebook" class="inline-block h-4 w-4"></a>
@endif
@if (isset($instagram[$site->id]))
<a href="{{$instagram[$site->id] }}" target="_blank"><img src="instagram.svg" alt="instagram" class="inline-block h-4 w-4"></a>
@endif
@if (isset($linkedin[$site->id]))
<a href="{{$linkedin[$site->id] }}" target="_blank"><img src="linkedin.svg" alt="linkedin" class="inline-block h-4 w-4"></a>
@endif
<br> @endforeach

<h1>Shopping</h1>
<?php
$subcat = 0;
?>
@foreach ($Shopping as $site)
<?php
if ($site->subcategory_id != $subcat) {
    echo "<h4>" . $subcategories[$site->subcategory_id] . "</h4>";
    $subcat = $site->subcategory_id;
}
?>
<a href="{{ $site->url }}" target="_blank" class="link">{{ $site->name }}</a>
@if (isset($twitter[$site->id]))
<a href="{{$twitter[$site->id] }}" target="_blank"><img src="twitter.svg" alt="twitter" class="inline-block h-4 w-4"></a>
@endif
@if (isset($facebook[$site->id]))
<a href="{{$facebook[$site->id] }}" target="_blank"><img src="facebook.svg" alt="facebook" class="inline-block h-4 w-4"></a>
@endif
@if (isset($instagram[$site->id]))
<a href="{{$instagram[$site->id] }}" target="_blank"><img src="instagram.svg" alt="instagram" class="inline-block h-4 w-4"></a>
@endif
@if (isset($linkedin[$site->id]))
<a href="{{$linkedin[$site->id] }}" target="_blank"><img src="linkedin.svg" alt="twitter" class="inline-block h-4 w-4"></a>
@endif
<br> @endforeach

<h1>Finance</h1>
<?php
$subcat = 0;
?>
@foreach ($Finance as $site)
<?php
if ($site->subcategory_id != $subcat) {
    echo "<h4>" . $subcategories[$site->subcategory_id] . "</h4>";
    $subcat = $site->subcategory_id;
}
?>
<a href="{{ $site->url }}" target="_blank" class="link">{{ $site->name }}</a>
@if (isset($twitter[$site->id]))
<a href="{{$twitter[$site->id] }}" target="_blank"><img src="twitter.svg" alt="twitter" class="inline-block h-4 w-4"></a>
@endif
@if (isset($facebook[$site->id]))
<a href="{{$facebook[$site->id] }}" target="_blank"><img src="facebook.svg" alt="facebook" class="inline-block h-4 w-4"></a>
@endif
@if (isset($instagram[$site->id]))
<a href="{{$instagram[$site->id] }}" target="_blank"><img src="instagram.svg" alt="instagram" class="inline-block h-4 w-4"></a>
@endif
@if (isset($linkedin[$site->id]))
<a href="{{$linkedin[$site->id] }}" target="_blank"><img src="linkedin.svg" alt="linkedin" class="inline-block h-4 w-4"></a>
@endif
<br> @endforeach


<h1>Sport</h1>
<?php
$subcat = 0;
?>
@foreach ($Sport as $site)
<?php
if ($site->subcategory_id != $subcat) {
    echo "<h4>" . $subcategories[$site->subcategory_id] . "</h4>";
    $subcat = $site->subcategory_id;
}
?>
<a href="{{ $site->url }}" target="_blank" class="link">{{ $site->name }}</a>
@if (isset($twitter[$site->id]))
<a href="{{$twitter[$site->id] }}" target="_blank"><img src="twitter.svg" alt="twitter" class="inline-block h-4 w-4"></a>
@endif
@if (isset($facebook[$site->id]))
<a href="{{$facebook[$site->id] }}" target="_blank"><img src="facebook.svg" alt="facebook" class="inline-block h-4 w-4"></a>
@endif
@if (isset($instagram[$site->id]))
<a href="{{$instagram[$site->id] }}" target="_blank"><img src="instagram.svg" alt="instagram" class="inline-block h-4 w-4"></a>
@endif
@if (isset($linkedin[$site->id]))
<a href="{{$linkedin[$site->id] }}" target="_blank"><img src="linkedin.svg" alt="linkedin" class="inline-block h-4 w-4"></a>
@endif
<br> @endforeach

<h1>Property</h1>
<?php
$subcat = 0;
?>
@foreach ($Property as $site)
<?php
if ($site->subcategory_id != $subcat) {
    echo "<h4>" . $subcategories[$site->subcategory_id] . "</h4>";
    $subcat = $site->subcategory_id;
}
?>
<a href="{{ $site->url }}" target="_blank" class="link">{{ $site->name }}</a>
@if (isset($twitter[$site->id]))
<a href="{{$twitter[$site->id] }}" target="_blank"><img src="twitter.svg" alt="twitter" class="inline-block h-4 w-4"></a>
@endif
@if (isset($facebook[$site->id]))
<a href="{{$facebook[$site->id] }}" target="_blank"><img src="facebook.svg" alt="facebook" class="inline-block h-4 w-4"></a>
@endif
@if (isset($instagram[$site->id]))
<a href="{{$instagram[$site->id] }}" target="_blank"><img src="instagram.svg" alt="instagram" class="inline-block h-4 w-4"></a>
@endif
@if (isset($linkedin[$site->id]))
<a href="{{$linkedin[$site->id] }}" target="_blank"><img src="linkedin.svg" alt="linkedin" class="inline-block h-4 w-4"></a>
@endif
<br> @endforeach

<h1>London Media and News</h1>
<?php
$subcat = 0;
?>
@foreach ($Media as $site)
<?php
if ($site->subcategory_id != $subcat) {
    echo "<h4>" . $subcategories[$site->subcategory_id] . "</h4>";
    $subcat = $site->subcategory_id;
}
?>
<a href="{{ $site->url }}" target="_blank" class="link">{{ $site->name }}</a>
@if (isset($twitter[$site->id]))
<a href="{{$twitter[$site->id] }}" target="_blank"><img src="twitter.svg" alt="twitter" class="inline-block h-4 w-4"></a>
@endif
@if (isset($facebook[$site->id]))
<a href="{{$facebook[$site->id] }}" target="_blank"><img src="facebook.svg" alt="facebook" class="inline-block h-4 w-4"></a>
@endif
@if (isset($instagram[$site->id]))
<a href="{{$instagram[$site->id] }}" target="_blank"><img src="instagram.svg" alt="instagram" class="inline-block h-4 w-4"></a>
@endif
@if (isset($linkedin[$site->id]))
<a href="{{$linkedin[$site->id] }}" target="_blank"><img src="linkedin.svg" alt="linkedin" class="inline-block h-4 w-4"></a>
@endif
<br> @endforeach

<h1>Information</h1>
<?php
$subcat = 0;
?>
@foreach ($Info as $site)
<?php
if ($site->subcategory_id != $subcat) {
    echo "<h4>" . $subcategories[$site->subcategory_id] . "</h4>";
    $subcat = $site->subcategory_id;
}
?>
<a href="{{ $site->url }}" target="_blank" class="link">{{ $site->name }}</a>
@if (isset($twitter[$site->id]))
<a href="{{$twitter[$site->id] }}" target="_blank"><img src="twitter.svg" alt="twitter" class="inline-block h-4 w-4"></a>
@endif
@if (isset($facebook[$site->id]))
<a href="{{$facebook[$site->id] }}" target="_blank"><img src="facebook.svg" alt="facebook" class="inline-block h-4 w-4"></a>
@endif
@if (isset($instagram[$site->id]))
<a href="{{$instagram[$site->id] }}" target="_blank"><img src="instagram.svg" alt="instagram" class="inline-block h-4 w-4"></a>
@endif
@if (isset($linkedin[$site->id]))
<a href="{{$linkedin[$site->id] }}" target="_blank"><img src="linkedin.svg" alt="linkedin" class="inline-block h-4 w-4"></a>
@endif
<br> @endforeach

<h1>London Event Venues</h1>
<?php
$subcat = 0;
?>
@foreach ($Events as $site)
<?php
if ($site->subcategory_id != $subcat) {
    echo "<h4>" . $subcategories[$site->subcategory_id] . "</h4>";
    $subcat = $site->subcategory_id;
}
?>
<a href="{{ $site->url }}" target="_blank" class="link">{{ $site->name }}</a>
@if (isset($twitter[$site->id]))
<a href="{{$twitter[$site->id] }}" target="_blank"><img src="twitter.svg" alt="twitter" class="inline-block h-4 w-4"></a>
@endif
@if (isset($facebook[$site->id]))
<a href="{{$facebook[$site->id] }}" target="_blank"><img src="facebook.svg" alt="facebook" class="inline-block h-4 w-4"></a>
@endif
@if (isset($instagram[$site->id]))
<a href="{{$instagram[$site->id] }}" target="_blank"><img src="instagram.svg" alt="instagram" class="inline-block h-4 w-4"></a>
@endif
@if (isset($linkedin[$site->id]))
<a href="{{$linkedin[$site->id] }}" target="_blank"><img src="linkedin.svg" alt="linkedin" class="inline-block h-4 w-4"></a>
@endif
<br> @endforeach

<hr>

Current count of websites : {{$countSaved}}

<p>We would like to hear from you about any website that we link to, and would also like to receive your recommendations for other sites that we should add please contact us via <a href="https://twitter.com/londiniumcom" target="_blank"><img src="twitter.svg" alt="twitter" class="inline-block h-4 w-4">@londiniumcom</a></p>

<br> Updated: {{ date('l jS F, Y', strtotime($date)) }} AD