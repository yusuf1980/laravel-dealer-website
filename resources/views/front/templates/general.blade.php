							<div class="post_list_meta">
								<div class="post_list_author page">
									<div class="share_social">
										{!! Share::page(url($page->slug), $page->title, ['class' => 'btn btn-default'])
											->facebook()
											->twitter()
											->googlePlus() !!}
									</div>
								</div>
							</div>