@php($placeholder = 'rechercher')
@php($placeholder_arabe = 'بحث')
@php($placeholder_space = '&nbsp;&nbsp;')

<header class="banner navbar fixed-top navbar-toggleable-md bg-faded" style="background:transparent; z-index:3">
	<form class="form-inline my-2 my-lg-0 mx-auto">
		→ &nbsp;
		<input id="search-input" name="keyword" type="text" placeholder="{{$placeholder . $placeholder_space . $placeholder_arabe}}" onfocus="this.value = '';" style="outline: none; font-family:'SuisseIntl';">
	</form>
</header>
