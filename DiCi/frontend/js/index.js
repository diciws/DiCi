var xmlns="http://www.w3.org/2000/svg", select = function(s) {
      return document.querySelector(s);
    }, selectAll = function(s) {
      return document.querySelectorAll(s);
    }, 
    bowStraight = select('.bowStraight'),
    bowPulled = select('.bowPulled'),
    stringStraight = select('.stringStraight'),
    stringPulled = select('.stringPulled'),
    arrow = select('.arrow')

TweenMax.set('svg', {
  visibility:'visible'
})
TweenMax.set(arrow, {
  transformOrigin:'0% 50%'
})

var archeryTl = new TimelineMax({paused:false, repeat:-1, yoyo:false, repeatDelay:0.1});
archeryTl.to(stringStraight, 1, {
  ease:Expo.easeOut,
  morphSVG:{
    points:stringPulled.getAttribute('points')  
  }
})
.to(bowStraight, 1, {
  ease:Expo.easeOut,
  morphSVG:'.bowPulled'
  
},'-=1')
.to(arrow, 1, {
  x:118,
   ease:Expo.easeOut
},'-=1')
.to(stringStraight, 0.6, {
  morphSVG:{
    points:stringStraight.getAttribute('points')  
  },
  ease:Elastic.easeOut.config(2,0.3)
})
.to(bowStraight, 0.6, {
  ease:Elastic.easeOut.config(2,0.3),
  morphSVG:bowStraight.getAttribute('d')  
  
},'-=0.6')
.to(arrow, 0.4, {
  x:-600,
  ease:Power4.easeOut
},'-=0.6')

.fromTo(arrow, 0.4, {
  x:900
},{
  x:0,
  ease:Expo.easeIn,
  immediateRender:false
})
.fromTo(arrow, 1, {
  rotation:13
},{
  rotation:0,
  ease:Elastic.easeOut.config(1, 0.2),
  immediateRender:false
},'-=0.3')

