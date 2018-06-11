<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "WebSite",
  "url": "<?php echo get_option('home'); ?>"
}
<?php 
	if ( is_singular( array( 'articles', 'roundups' ) ) ) : ?>
,{
	"@context": "https://schema.org",
	"@type": "BlogPosting",
	"url": "<?php echo get_permalink(); ?>",
	"headline": "<?php the_title(); ?>",
	"alternativeHeadline": "<?php the_field('sub_heading'); ?>",
	"description": "Structured data is bla bla bla bla",
	"datePublished": "July 4, 2017",
	"datemodified": "July 5, 2017",
	"mainEntityOfPage": {
	"@type": "WebPage",
	"url": "https://ahrefs.com/blog/bla-bla-bla"
}
	<?php endif; ?>
</script>