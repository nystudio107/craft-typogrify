import {defineConfig} from 'vitepress'

export default defineConfig({
  title: 'Typogrify Plugin',
  description: 'Documentation for the Typogrify plugin',
  base: '/docs/typogrify/v4/',
  lang: 'en-US',
  head: [
    ['meta', {content: 'https://github.com/nystudio107', property: 'og:see_also',}],
    ['meta', {content: 'https://twitter.com/nystudio107', property: 'og:see_also',}],
    ['meta', {content: 'https://youtube.com/nystudio107', property: 'og:see_also',}],
    ['meta', {content: 'https://www.facebook.com/newyorkstudio107', property: 'og:see_also',}],
  ],
  themeConfig: {
    socialLinks: [
      {icon: 'github', link: 'https://github.com/nystudio107'},
      {icon: 'twitter', link: 'https://twitter.com/nystudio107'},
    ],
    logo: '/img/plugin-logo.svg',
    editLink: {
      pattern: 'https://github.com/nystudio107/craft-typogrify/edit/develop-v4/docs/docs/:path',
      text: 'Edit this page on GitHub'
    },
    algolia: {
      appId: 'IWCR84RUUZ',
      apiKey: 'd17b32a7fd4c9ef1f5e6059b9a7b0352',
      indexName: 'nystudio107-typogrify',
      searchParameters: {
        facetFilters: ["version:v4"],
      },
    },
    lastUpdatedText: 'Last Updated',
    sidebar: [],
    nav: [
      {text: 'Home', link: 'https://nystudio107.com/plugins/typogrify'},
      {text: 'Store', link: 'https://plugins.craftcms.com/typogrify'},
      {text: 'Changelog', link: 'https://nystudio107.com/plugins/typogrify/changelog'},
      {text: 'Issues', link: 'https://github.com/nystudio107/craft-typogrify/issues'},
      {
        text: 'v4', items: [
          {text: 'v5', link: 'https://nystudio107.com/docs/typogrify/'},
          {text: 'v4', link: '/'},
          {text: 'v1', link: 'https://nystudio107.com/docs/typogrify/v1/'},
        ],
      },
    ]
  },
});
