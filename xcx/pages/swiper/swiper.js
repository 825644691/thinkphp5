// pages/swiper/swiper.js
Page({

  /**
   * 页面的初始数据
   */
  data: {
    images:[
      { file:'red.jpg',page:'page1'},
      { file: 'green.jpg', page: 'page2' },
      { file: 'blue.jpg', page: 'page3' },
    ],
    current:0
  
  },
  setCurrent:function(e){
    //console.log(e)
    this.setData({
      current:e.detail.current
    }

    )
  },
  goto:function(){
    let p = this.data.images[this.dara.current].pagewx.navigateTo({
      url: '/pages/'+p+'/'+p,
    })
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
  
  },

  /**
   * 生命周期函数--监听页面初次渲染完成
   */
  onReady: function () {
  
  },

  /**
   * 生命周期函数--监听页面显示
   */
  onShow: function () {
  
  },

  /**
   * 生命周期函数--监听页面隐藏
   */
  onHide: function () {
  
  },

  /**
   * 生命周期函数--监听页面卸载
   */
  onUnload: function () {
  
  },

  /**
   * 页面相关事件处理函数--监听用户下拉动作
   */
  onPullDownRefresh: function () {
  
  },

  /**
   * 页面上拉触底事件的处理函数
   */
  onReachBottom: function () {
  
  },

  /**
   * 用户点击右上角分享
   */
  onShareAppMessage: function () {
  
  }
})