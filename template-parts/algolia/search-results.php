<main id="search-results" class="content  content--search-results" style="display: none;">
	<div class="container">
		<div id="search-results-hits"></div>
		<div id="search-results-pagination"></div>
	</div>
</main>

<script type="text/html" id="tmpl-search-result">

	<article class="search-result {{#_highlightResult.taxonomies.useful_contacts_cat.length}}contact-icon{{/_highlightResult.taxonomies.useful_contacts_cat.length}} {{{ post_type }}}">
		{{#images.post-thumbnail.url}}
		<div class="grid">
				<div class="grid__column  grid__column--s-3  grid__column--l-4">
					<div class="search-result--thumbnail">
						<a href="{{ permalink }}" title="{{ post_title }}" target="_blank">
							<img src="{{ images.post-thumbnail.url }}" alt="{{{ post_title }}}" title="{{{ post_title }}}" itemprop="image">
						</a>
					</div>
				</div>

				<div class="grid__column  grid__column--s-9  grid__column--l-8">
		{{/images.post-thumbnail.url}}

		<div class="search-result__details">

			<h1 class="search-result__title">
				<a href="{{ permalink }}" title="{{ post_title }}" target="_blank">
					{{{ _highlightResult.post_title.value }}}
				</a>
				
			</h1>

			{{#_highlightResult.taxonomies.mybbp_video_presenter.length}}
				<div class="search-result__presenter">
					{{#_highlightResult.taxonomies.mybbp_video_presenter}}
						<span>{{{value}}}</span>
					{{/_highlightResult.taxonomies.mybbp_video_presenter}}
				</div>
			{{/_highlightResult.taxonomies.mybbp_video_presenter.length}}

			<div class="search-result__summary">
				<p>{{#helpers.relevantContent}}{{/helpers.relevantContent}}</p>
			</div>

			<footer class="search-result__footer">
				<div class="grid">
					<div class="grid__column  grid__column--6">
						<span class="tag">{{ post_type_label_singular }}</span>
					</div>

					<div class="grid__column  grid__column--6  u-text-right">
						<a href="{{ permalink }}" class="search-result__more" target="_blank">
						{{#_highlightResult.taxonomies.category.length}}
							View Contact
						{{/_highlightResult.taxonomies.category.length}}

						{{^_highlightResult.taxonomies.category.length}}
							Read More
						{{/_highlightResult.taxonomies.category.length}}
						
						</a>
					</div>
				</div>
			</footer>
		</div>

		{{#images.post-thumbnail.url}}
			</div>
		</div>
		{{/images.post-thumbnail.url}}

	</article>
</script>