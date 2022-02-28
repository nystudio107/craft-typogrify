module.exports = {
  title: 'Typogrify Plugin Documentation',
  description: 'Documentation for the Typogrify plugin',
  base: '/docs/typogrify/',
  lang: 'en-US',
  head: [
    ['meta', {content: 'https://github.com/nystudio107', property: 'og:see_also',}],
    ['meta', {content: 'https://twitter.com/nystudio107', property: 'og:see_also',}],
    ['meta', {content: 'https://youtube.com/nystudio107', property: 'og:see_also',}],
    ['meta', {content: 'https://www.facebook.com/newyorkstudio107', property: 'og:see_also',}],
  ],
  themeConfig: {
    repo: 'nystudio107/craft-typogrify',
    docsDir: 'docs/docs',
    docsBranch: 'develop',
    algolia: {
      appId: 'IWCR84RUUZ',
      apiKey: 'c0990b4abc81fab70346627d74a4c757',
      indexName: 'nystudio107-typogrify'
    },
    editLinks: true,
    editLinkText: 'Edit this page on GitHub',
    lastUpdated: 'Last Updated',
    sidebar: 'auto',
  },
};
