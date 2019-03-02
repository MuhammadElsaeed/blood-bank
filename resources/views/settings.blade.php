{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('phone', 'Phone:') !!}
			{!! Form::text('phone') !!}
		</li>
		<li>
			{!! Form::label('email', 'Email:') !!}
			{!! Form::text('email') !!}
		</li>
		<li>
			{!! Form::label('facebook_url', 'Facebook_url:') !!}
			{!! Form::text('facebook_url') !!}
		</li>
		<li>
			{!! Form::label('twitter_url', 'Twitter_url:') !!}
			{!! Form::text('twitter_url') !!}
		</li>
		<li>
			{!! Form::label('youtube_url', 'Youtube_url:') !!}
			{!! Form::text('youtube_url') !!}
		</li>
		<li>
			{!! Form::label('instagram_url', 'Instagram_url:') !!}
			{!! Form::text('instagram_url') !!}
		</li>
		<li>
			{!! Form::label('whatsapp_url', 'Whatsapp_url:') !!}
			{!! Form::text('whatsapp_url') !!}
		</li>
		<li>
			{!! Form::label('google_url', 'Google_url:') !!}
			{!! Form::text('google_url') !!}
		</li>
		<li>
			{!! Form::label('about', 'About:') !!}
			{!! Form::text('about') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}