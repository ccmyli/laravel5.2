<template >
<div :class="alertClasses" v-show="show">
<slot></slot>

<span class="Alert__close" @click="show = false">X</span>
</div>
</template>

<script>

 export default {

 	props:['type'],

 	data(){
 		return {
 			show : true
 		};
 	},

 	computed : {
 		alertClasses:function(){
 			var type = this.type;
 			return {
 				'alert':true,
 				'Alert--Success':type=='success' ,
 				'Alert--Error':type=='error' 			}
 		}
 	}
 }
</script>