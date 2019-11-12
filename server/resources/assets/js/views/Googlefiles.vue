<template  >

        	<div class="container">
        		
			<div class="row mt-5">
				<div class="col-md-12 dropbox">
					<div class="d-inline-block"><h5>Google Drive</h5></div>
					<div class="d-inline-block float-right"><h2>*</h2></div>
				</div>
			</div>
			<div class="row">
				<b class="p-3" style="color: #0071cc;border-bottom: 2px solid #0071cc">ALL</b>
			</div>
			<div class="well">
        	</div>
        	
        	<!-- <ul>
			  <li v-for="item in ar">
			      {{ item.name }}
			  </li>
			</ul> -->
			
			<div class="row p-3" v-for="(item, index) in ar"> 
				<div class="col-md-1"><input type="checkbox"  name="file_values" v-model="checkedItems"  :value="item.webContentLink"></div>
				<div class="col-md-1"><img src="../../images/cms/q.png" width="30px"></div>
				<div class="col-md-8">{{item.name}}</div>
			</div>

			 <button class="btn btn-success btn-block"   v-on:click="addFiles">Add Files</button>

		</div>

    </template>
    <script>
    import { EventBus } from "../event-bus";  	
    import router from "../router/index"; 
    export default {
        props: ['details'],
       
        data: function() {
          return {
           checkedItems:[],
            ar: JSON.parse(this.details),
            count : 0
          }
        },
        methods:
        {

        	addFiles()
        	{
        		
        		//window.opener.ProcessChildMessage('Message to the parent');
        		//this.$emit('checkedemaititems', this.checkedItems);

        		EventBus.$emit('checkedemaititems', this.checkedItems);
        		
        		var div = document.createElement('div');
	            var table = document.createElement('table');
	            for (var i = 0; i < this.checkedItems.length; i++){
	                var tr = document.createElement('tr');   

	                var td1 = document.createElement('td');
	                //var td2 = document.createElement('td');

	                var text1 = document.createTextNode('Text1');
	                var img = document.createElement('img');
	                img.src = this.checkedItems[i];
	                img.style.width="100px";
	                img.style.height="100px";
	                var text2 = document.createTextNode('Text2');

	                td1.appendChild(img);
	                //td2.appendChild(text2);
	                tr.appendChild(td1);
	                //tr.appendChild(td2);

	                table.appendChild(tr);
	            }
	            var button = document.createElement("input");
	            button.type = "button";
	            button.value = "Next";
	            button.className  = "btn btn-success btn-block";
	            button.style.width="100px";
	            div.appendChild(table);
	            div.appendChild(button);
        		var parentText = window.opener.document.getElementById('f2');
        		console.log("tesvalue"+parentText);
        		parentText.appendChild(div);
        		self.close();
        		 //self.close();
        		// /window.close();
        		//console.log(this.checkedItems);
        		//window.opener.location.reload();
        		//window.close();
        	}
        }
    }
</script>
     