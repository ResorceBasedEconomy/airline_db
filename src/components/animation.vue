<template>
  <div>
    <div class="container">
      <div class="jumbotron">
        <h1 @click="toShow = !toShow" class="animated tada">CodingAcademy Vue JS</h1>
        <br>
        <h2 class="text-center animated rubberBand" style="animation-delay:1s"> Only for badass developers
</h2>
</div>
<div id="demo">
  <button v-on:click="toShow = !toShow">
            Toggle
          </button>
  <br><br>
  <!--<transition enter-active-class="animated bounce" leave-active-class="animated shake">
            <div class="alert alert-info" v-show="toShow">Hi There!</div>
          </transition>-->
  <!--<transition name="fade" mode="out-in" appear>
    <div class="alert alert-info" v-if="toShow" key="d1">Hello? Yes!</div>
    <div class="alert alert-info" v-if="!toShow" key="d2">Hello? No</div>
  </transition>-->
</div>
<!--<div id="example-2">
  <button @click="show = !show">Toggle show</button>
  <transition name="bounce">
    <p v-if="show">Look at me!</p>
  </transition>
</div>-->
<!--<div id="list-demo" class="demo">
  <button v-on:click="add">Add</button>
  <button v-on:click="remove">Remove</button>
  <transition-group name="list" tag="section">
    <span v-for="item in items" :key="item" class="list-item">
      {{ item }}
    </span>
  </transition-group>
</div>-->
<div id="last-animation-sample">
  <button @click="shouldAnimate = !shouldAnimate">Animate Now!</button><br><br>
  <div class="alert alert-danger" :class="{animated: shouldAnimate, bounceIn:shouldAnimate}">Hello There!!!</div>
</div>
</div>
</div>
</template>
<script>
  export default {
    data: () => {
      return {
        toShow: false,
        show: false,
        items: [1, 2, 3, 4, 5, 6, 7, 8, 9],
        nextNum: 10,
        shouldAnimate :false
      }
    },
    methods: {
      randomIndex: function () {
        return Math.floor(Math.random() * this.items.length)
      },
      add: function () {
        this.items.splice(this.randomIndex(), 0, this.nextNum++)
      },
      remove: function () {
        this.items.splice(this.randomIndex(), 1)
      },
    }
  }
</script>
<style scoped>
.fade-enter-active, .fade-leave-active {
  transition: opacity .5s
}
.fade-enter, .fade-leave-active {
  opacity: 0
}
.bounce-enter-active {
  animation: bounce-in 1.5s;
}
.bounce-leave-active {
  animation: bounce-out 1.5s;
}
@keyframes bounce-in {
  0% {
    transform: scale(0);
  }
  50% {
    transform: scale(1.5);
  }
  100% {
    transform: scale(1);
  }
}
@keyframes bounce-out {
  0% {
    transform: scale(1);
  }
  50% {
    transform: scale(1.5);
  }
  100% {
    transform: scale(0);
  }
}
.list-item {
  display: inline-block;
  margin-right: 10px;
}
.list-enter-active, .list-leave-active {
  transition: all 1s;
}
.list-enter, .list-leave-active {
  opacity: 0;
  transform: translateY(30px);
}
</style>
