@php($placeholder = 'rechercher')
@php($placeholder_arabe = 'بحث')
@php($placeholder_space = '&nbsp;&nbsp;')

{{-- http://jsfiddle.net/mhsyfvv9/ --}}
<style media="screen">
input#search-input:not([value=""]):not(:focus):invalid {
	background-color: tomato;
}
</style>

<header class="banner navbar fixed-top navbar-toggleable-md bg-faded" style="background:transparent; z-index:3">
	<form class="form-inline my-2 my-lg-0 mx-auto">
		{{-- <input id="search-input" name="keyword" type="text" onfocus="this.value = '';" style="outline: none; font-family:'SuisseIntl'; text-decoration:underline; text-transform:uppercase;" onblur="this.value=''"> --}}
		<input id="search-input" name="keyword" type="text"  style="outline: none; font-family:'SuisseIntl'; text-decoration:underline; text-transform:uppercase;" onkeyup="this.setAttribute('value', this.value);" value="">
	</form>
</header>
{{-- onfocus="this.value = '';" --}}
