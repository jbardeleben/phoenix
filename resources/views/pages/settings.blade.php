@extends('templates.pages')


@section('pagetitle', ' - Profile Settings')
@section('bannertitle', 'Your Profile Settings')
@section('leader', 'This is a temporary page place holder')


@section('content')
    <h1>SETTINGS PAGE</h1>
	<!-- button test - these buttons are being over ridden still by the button
         declaration. Try with an <a> or <span> and test. I want to try to use
         more customized buttons for this stuff...
	-->
    <hr>
    <h3>New Buttons Tester (for CSS styling)</h3>
    <br>

	<!-- DEFAULT BUTTON STYLE. The state styles follow and are defined in main.css -->
	<button class="bem-button">Normal button</button>
	<button class="bem-button button--state-primary">Primary button</button>
	<button class="bem-button button--state-success">Success button</button>
	<button class="bem-button button--state-warning">Warning button</button>
	<button class="bem-button button--state-danger">Danger button</button>
    <br><br>
    <!-- SMALL BUTTONS -->
	<button class="bem-button bem-btn-sm">Normal button</button>
	<button class="bem-button button--state-primary bem-btn-sm">Primary button</button>
	<button class="bem-button button--state-success bem-btn-sm">Success button</button>
	<button class="bem-button button--state-warning bem-btn-sm">Warning button</button>
	<button class="bem-button button--state-danger bem-btn-sm">Danger button</button>
    <br><br>
    <!-- EXTRA SMALL BUTTONS -->
	<button class="bem-button bem-btn-xs">Normal button</button>
	<button class="bem-button button--state-primary bem-btn-xs">Primary button</button>
	<button class="bem-button button--state-success bem-btn-xs">Success button</button>
	<button class="bem-button button--state-warning bem-btn-xs">Warning button</button>
	<button class="bem-button button--state-danger bem-btn-xs">Danger button</button>
    <br><br>
    <!-- LARGE BUTTONS -->
	<button class="bem-button bem-btn-lg">Normal button</button>
	<button class="bem-button button--state-primary bem-btn-lg">Primary button</button>
	<button class="bem-button button--state-success bem-btn-lg">Success button</button>
	<button class="bem-button button--state-warning bem-btn-lg">Warning button</button>
	<button class="bem-button button--state-danger bem-btn-lg">Danger button</button>

    <p class="helper-space-top">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tortor enim, adipiscing in semper a, pellentesque quis sem. Vivamus eu odio at tellus sollicitudin viverra. Sed dignissim molestie imperdiet. Nulla sit amet tortor eu nisl vestibulum dignissim. Donec scelerisque vulputate tortor, non dapibus massa molestie at. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Etiam a mauris sit amet augue suscipit dapibus non in lectus. Nunc mattis eros ligula, ut tincidunt sapien. Nulla eget velit ipsum. Suspendisse potenti. Suspendisse et sem at sem sagittis lobortis. Quisque lacinia, nisl in elementum aliquet, arcu neque rhoncus tellus, at ornare mi enim sit amet sem. Phasellus a nisi vel ipsum laoreet mollis.
      </p>
@stop