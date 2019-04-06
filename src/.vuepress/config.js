
module.exports = {
  head: [
    ['link', { rel: 'icon', type: 'image/png', href: '/favicon.png' }],
    ['link', { rel: 'stylesheet', href: 'https://fonts.googleapis.com/css?family=Kosugi+Maru' }]
  ],
  themeConfig: {
    sidebar: [
      '/',
      '/intro/',
      '/insertsort/',
      '/bubblesort/',
      '/selectsort/',
      '/shellsort/',
      '/mergesort/',
      '/partition/',
      '/quicksort/',
      '/stack/',
      '/allsearch/',
      '/linearsearch/',
      '/splitsearch/',
      '/roottree/',
      '/binarytree/',
      '/patroltree/',
      '/binarysearch/'
    ]
  },
  title: 'データ構造とアルゴリズム',
  base: '/algorithm-traning/',
  dest: 'docs'
}