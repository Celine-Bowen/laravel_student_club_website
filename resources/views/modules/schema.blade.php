<!-- Schema -->
<script type="application/ld+json">
  {
    "@context" : "http://schema.org",
    "@type" : "Organization",
    "name" : "@yield('pageTitle',  config('app.name'))",
    "alternateName" : "copatechclub",
    "sponsor" : "copatech",
    "email" : "contact@cuktech.onlineacademicexperts.com",
    "address" : "Karen, Kenya",
    "image" : "@yield('pageImage', config('app.url').'/assets/images/icons/icon-512x512.png')",
    "description" : "@yield('pageDescription', 'A community of techies utilizing copa technologies')",
    "url" : "{{ url()->current() }}",
    "logo": {
      "@type": "ImageObject",
      "text": "copatechclub",
      "url": "http://cuktech.onlineacademicexperts.com/assets/images/web/brand/logo.png",
      "sameAs" : "http://cuktech.onlineacademicexperts.com/assets/images/icons/icon-512x512.png",
      "about": "copatechclub logo",
      "height": "1023",
      "width": "1112"
    },
    "sameAs" : "http://www.youtube.com/channel/",
    "contactPoint" : [
      {
        "@type" : "ContactPoint",
        "contactType" : "Lead",
        "name" : "jeremih",
        "image" : "http://cuktech.onlineacademicexperts.com/assets/images/web/team/emmanuel_joseph_jet.png",
        "email" : "jet@cuktech.onlineacademicexperts.com",
        "availableLanguage" : ["English",],
        "sameAs" : "http://t.me/"
      },
      {
        "@type" : "ContactPoint",
        "contactType" : "Co-Lead",
        "name" : "Jesulonimi Akingbesote",
        "image" : "http://cuktech.onlineacademicexperts.com/assets/images/web/team/jesulonimi_akingbesote.png",
        "email" : "lonimi@cuktech.onlineacademicexperts.com",
        "availableLanguage" : ["English","french"],
        "sameAs" : "http://t.me/"
      }
    ]
  }
</script>
