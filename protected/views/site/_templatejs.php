<script type="text/template" id="pictureTemplate">
	<span class="img">
		<img src="http://host2.demo16753.atservers.net/images/products/medium/<%= image %>"
		<% if( window.PageView.model.get('lang') == 1 ) { %>
			alt= "Работа татто-мастера <%= master_lang1 %> под названием «<%= name_lang1 %>»"
		<% } %>
		<% if( window.PageView.model.get('lang') == 2 ) { %>
			alt= "Work Tatto-master <%= master_lang2 %> called the «<%= name_lang2 %>»"
		<% } %>
		<% if( window.PageView.model.get('lang') == 3 ) { %>
			alt= "Праца Татта-майстры <%= master_lang3 %> пад назвай «<%= name_lang3 %>»"
		<% } %>
		/>
	</span>
	<span class="about">
		<span class="mask">
			<span class="master_name">
				<% if( window.PageView.model.get('lang') == 1 ) { %>
					<%= master_lang1 %>
				<% } %>
				<% if( window.PageView.model.get('lang') == 2 ) { %>
					<%= master_lang2 %>
				<% } %>
				<% if( window.PageView.model.get('lang') == 3 ) { %>
					<%= master_lang3 %>
				<% } %>
			</span>
			<span class="name">
				<% if( window.PageView.model.get('lang') == 1 ) { %>
					«<%= name_lang1 %>»
				<% } %>
				<% if( window.PageView.model.get('lang') == 2 ) { %>
					«<%= name_lang2 %>»
				<% } %>
				<% if( window.PageView.model.get('lang') == 3 ) { %>
					«<%= name_lang3 %>»
				<% } %>
			</span>
			<span class="date"><%= date_create %></span>
		</span>
	</span>
</script>

<script type="text/template" id="modalTemplate">
	<div class="m_m">
		<div class="m_m_m">
			<div class="m_m_m_body">
				<div class="m_m_m_header">
					<a href="#" class="close"></a>
				</div>
				<div class="m_m_m_content"></div>
				<div class="m_m_m_footer"></div>
			</div>
		</div>
	</div>
</script>

<script type="text/template" id="modalHeader">
	<!--
	<a class="vk" href="#"></a>
	<a class="fb" href="#"></a>
	<a class="tw" href="#"></a>
	<a class="gp" href="#"></a>
	-->
</script>

<script type="text/template" id="modalContentNavigation">
	<a href="#<%= last_image %>" class="arrow_left" title="last image"></a>
	<a href="#<%= next_image %>" class="arrow_right" title="next image"></a>
</script>

<script type="text/template" id="modalContentImage">

	<img src="http://host2.demo16753.atservers.net/images/products/<%= image %>"
	<% if( window.PageView.model.get('lang') == 1 ) { %>
		alt= "Работа татто-мастера <%= master_lang1 %> под названием «<%= name_lang1 %>» (увеличенное изображение)"
	<% } %>
	<% if( window.PageView.model.get('lang') == 2 ) { %>
		alt= "Work Tatto-master <%= master_lang2 %> called the «<%= name_lang2 %>» (big foto)"
	<% } %>
	<% if( window.PageView.model.get('lang') == 3 ) { %>
		alt= "Праца Татта-майстры <%= master_lang3 %> пад назвай «<%= name_lang3 %>» (вялiкае фота)"
	<% } %>
	/>

</script>

<script type="text/template" id="modalFooterText">
		<div class="artist_name">
			<a href="http://host2.demo16753.atservers.net/artists/<%= master_url %>">
				<% if( window.PageView.model.get('lang') == 1 ) { %>
					<%= master_lang1 %>
				<% } %>
				<% if( window.PageView.model.get('lang') == 2 ) { %>
					<%= master_lang2 %>
				<% } %>
				<% if( window.PageView.model.get('lang') == 3 ) { %>
					<%= master_lang3 %>
				<% } %>
			</a>
		</div>
		<div class="photo_name">
			<% if( window.PageView.model.get('lang') == 1 ) { %>
				«<%= name_lang1 %>»
			<% } %>
			<% if( window.PageView.model.get('lang') == 2 ) { %>
				«<%= name_lang2 %>»
			<% } %>
			<% if( window.PageView.model.get('lang') == 3 ) { %>
				«<%= name_lang3 %>»
			<% } %>
		</div>
		<div class="photo_date">
			<%= date_create %>
		</div>

</script>

<script type="text/template" id="ajaxLoader">
	<div class="ajax_loader">Please, wait...</div>
</script>
