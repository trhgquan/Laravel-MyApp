<div class="media-box">
	<div class="media">
		<div class="media-body">
			<h3 class="media-heading">
				{{ App\ForumPosts::postTitle($post->post_id) }}
			</h3>
			<small>
				@if (!$single)
					Đăng bởi <a href="{{ route('user.profile.username', ['username' => App\User::username($post->user_id)]) }}">{{ App\User::username($post->user_id) }}</a>, vào lúc <a href="{{ route('post', ['post_id' => $post->post_id]) }}">{{ date_format($post->created_at, 'd/m/Y h:i:s A') }}</a>
				@else
					Đăng bởi {{ App\User::username($post->user_id) }}, vào lúc {{ date_format($post->created_at, 'd/m/Y h:i:s A') }}
				@endif
			</small>
			<div class="media-content">
				<p>{{ $post->content }}
				<p class="pull-right">
				@if (Auth::check())
					@if (!App\UserReport::is_reported(Auth::id(), $post->post_id, 'post'))
						@if (App\UserReport::reportable(Auth::id(), $post->post_id, 'post'))
							<a href="{{ route('report.post', [$post->post_id]) }}">báo cáo</a>
						@endif
					@else
						<span class="label label-danger">đã báo cáo</span>
					@endif
				@endif
				</p>
			</div>
		</div>
	</div>
</div>