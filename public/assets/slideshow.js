var app = new Vue({
  el: '#header4-1',
  data () {
    return {
      backgrounds: ['background-image: url(assets/images/1.jpg);', 'background-image: url(assets/images/2.jpg);', 'background-image: url(assets/images/3.jpg);', 'background-image: url(assets/images/4.jpg);', 'background-image: url(assets/images/5.jpg);'],
      currentbg: 'background-image: url(assets/images/1.jpg);'
    }
  },

  mounted: function () {
    var int = 0
    setInterval(function () {
      app.currentbg = app.backgrounds[int]
      int++
      if (int > (app.backgrounds.length - 1)) { int = 0 }
    }, 5000)
  }
})