!function(){function e(t){var i=e.modules[t];if(!i)throw new Error('failed to require "'+t+'"');return"exports"in i||"function"!=typeof i.definition||(i.client=i.component=!0,i.definition.call(this,i.exports={},i),delete i.definition),i.exports}e.modules={},e.register=function(t,i){e.modules[t]={definition:i}},e.define=function(t,i){e.modules[t]={exports:i}},e.register("dropzone",function(t,i){i.exports=e("dropzone/lib/dropzone.js")}),e.register("dropzone/lib/dropzone.js",function(e,t){(function(){var e,i,n,r,o,s,l,a,u=[].slice,p={}.hasOwnProperty,d=function(e,t){function i(){this.constructor=e}for(var n in t)p.call(t,n)&&(e[n]=t[n]);return i.prototype=t.prototype,e.prototype=new i,e.__super__=t.prototype,e};l=function(){},i=function(){function e(){}return e.prototype.addEventListener=e.prototype.on,e.prototype.on=function(e,t){return this._callbacks=this._callbacks||{},this._callbacks[e]||(this._callbacks[e]=[]),this._callbacks[e].push(t),this},e.prototype.emit=function(){var e,t,i,n,r,o;if(n=arguments[0],e=2<=arguments.length?u.call(arguments,1):[],this._callbacks=this._callbacks||{},i=this._callbacks[n])for(r=0,o=i.length;o>r;r++)t=i[r],t.apply(this,e);return this},e.prototype.removeListener=e.prototype.off,e.prototype.removeAllListeners=e.prototype.off,e.prototype.removeEventListener=e.prototype.off,e.prototype.off=function(e,t){var i,n,r,o,s;if(!this._callbacks||0===arguments.length)return this._callbacks={},this;if(n=this._callbacks[e],!n)return this;if(1===arguments.length)return delete this._callbacks[e],this;for(r=o=0,s=n.length;s>o;r=++o)if(i=n[r],i===t){n.splice(r,1);break}return this},e}(),e=function(e){function t(e,i){var r,o,s;if(this.element=e,this.version=t.version,this.defaultOptions.previewTemplate=this.defaultOptions.previewTemplate.replace(/\n*/g,""),this.clickableElements=[],this.listeners=[],this.files=[],"string"==typeof this.element&&(this.element=document.querySelector(this.element)),!this.element||null==this.element.nodeType)throw new Error("Invalid dropzone element.");if(this.element.dropzone)throw new Error("Dropzone already attached.");if(t.instances.push(this),this.element.dropzone=this,r=null!=(s=t.optionsForElement(this.element))?s:{},this.options=n({},this.defaultOptions,r,null!=i?i:{}),this.options.forceFallback||!t.isBrowserSupported())return this.options.fallback.call(this);if(null==this.options.url&&(this.options.url=this.element.getAttribute("action")),!this.options.url)throw new Error("No URL provided.");if(this.options.acceptedFiles&&this.options.acceptedMimeTypes)throw new Error("You can't provide both 'acceptedFiles' and 'acceptedMimeTypes'. 'acceptedMimeTypes' is deprecated.");this.options.acceptedMimeTypes&&(this.options.acceptedFiles=this.options.acceptedMimeTypes,delete this.options.acceptedMimeTypes),this.options.method=this.options.method.toUpperCase(),(o=this.getExistingFallback())&&o.parentNode&&o.parentNode.removeChild(o),this.options.previewsContainer!==!1&&(this.previewsContainer=this.options.previewsContainer?t.getElement(this.options.previewsContainer,"previewsContainer"):this.element),this.options.clickable&&(this.clickableElements=this.options.clickable===!0?[this.element]:t.getElements(this.options.clickable,"clickable")),this.init()}var n,r;return d(t,e),t.prototype.Emitter=i,t.prototype.events=["drop","dragstart","dragend","dragenter","dragover","dragleave","addedfile","removedfile","thumbnail","error","errormultiple","processing","processingmultiple","uploadprogress","totaluploadprogress","sending","sendingmultiple","success","successmultiple","canceled","canceledmultiple","complete","completemultiple","reset","maxfilesexceeded","maxfilesreached","queuecomplete"],t.prototype.defaultOptions={url:null,method:"post",withCredentials:!1,parallelUploads:2,uploadMultiple:!1,maxFilesize:256,paramName:"file",createImageThumbnails:!0,maxThumbnailFilesize:10,thumbnailWidth:100,thumbnailHeight:100,maxFiles:null,params:{},clickable:!0,ignoreHiddenFiles:!0,acceptedFiles:null,acceptedMimeTypes:null,autoProcessQueue:!0,autoQueue:!0,addRemoveLinks:!1,previewsContainer:null,capture:null,dictDefaultMessage:"Drop files here to upload",dictFallbackMessage:"Your browser does not support drag'n'drop file uploads.",dictFallbackText:"Please use the fallback form below to upload your files like in the olden days.",dictFileTooBig:"File is too big ({{filesize}}MiB). Max filesize: {{maxFilesize}}MiB.",dictInvalidFileType:"You can't upload files of this type.",dictResponseError:"Server responded with {{statusCode}} code.",dictCancelUpload:"Cancel upload",dictCancelUploadConfirmation:"Are you sure you want to cancel this upload?",dictRemoveFile:"Remove file",dictRemoveFileConfirmation:null,dictMaxFilesExceeded:"You can not upload any more files.",accept:function(e,t){return t()},init:function(){return l},forceFallback:!1,fallback:function(){var e,i,n,r,o,s;for(this.element.className=""+this.element.className+" dz-browser-not-supported",s=this.element.getElementsByTagName("div"),r=0,o=s.length;o>r;r++)e=s[r],/(^| )dz-message($| )/.test(e.className)&&(i=e,e.className="dz-message");return i||(i=t.createElement('<div class="dz-message"><span></span></div>'),this.element.appendChild(i)),n=i.getElementsByTagName("span")[0],n&&(n.textContent=this.options.dictFallbackMessage),this.element.appendChild(this.getFallbackForm())},resize:function(e){var t,i,n;return t={srcX:0,srcY:0,srcWidth:e.width,srcHeight:e.height},i=e.width/e.height,t.optWidth=this.options.thumbnailWidth,t.optHeight=this.options.thumbnailHeight,null==t.optWidth&&null==t.optHeight?(t.optWidth=t.srcWidth,t.optHeight=t.srcHeight):null==t.optWidth?t.optWidth=i*t.optHeight:null==t.optHeight&&(t.optHeight=1/i*t.optWidth),n=t.optWidth/t.optHeight,e.height<t.optHeight||e.width<t.optWidth?(t.trgHeight=t.srcHeight,t.trgWidth=t.srcWidth):i>n?(t.srcHeight=e.height,t.srcWidth=t.srcHeight*n):(t.srcWidth=e.width,t.srcHeight=t.srcWidth/n),t.srcX=(e.width-t.srcWidth)/2,t.srcY=(e.height-t.srcHeight)/2,t},drop:function(e){return this.element.classList.remove("dz-drag-hover")},dragstart:l,dragend:function(e){return this.element.classList.remove("dz-drag-hover")},dragenter:function(e){return this.element.classList.add("dz-drag-hover")},dragover:function(e){return this.element.classList.add("dz-drag-hover")},dragleave:function(e){return this.element.classList.remove("dz-drag-hover")},paste:l,reset:function(){return this.element.classList.remove("dz-started")},addedfile:function(e){var i,n,r,o,s,l,a,u,p,d,c,h,m;if(this.element===this.previewsContainer&&this.element.classList.add("dz-started"),this.previewsContainer){for(e.previewElement=t.createElement(this.options.previewTemplate.trim()),e.previewTemplate=e.previewElement,this.previewsContainer.appendChild(e.previewElement),d=e.previewElement.querySelectorAll("[data-dz-name]"),o=0,a=d.length;a>o;o++)i=d[o],i.textContent=e.name;for(c=e.previewElement.querySelectorAll("[data-dz-size]"),s=0,u=c.length;u>s;s++)i=c[s],i.innerHTML=this.filesize(e.size);for(this.options.addRemoveLinks&&(e._removeLink=t.createElement('<a class="dz-remove" href="javascript:undefined;" data-dz-remove>'+this.options.dictRemoveFile+"</a>"),e.previewElement.appendChild(e._removeLink)),n=function(i){return function(n){return n.preventDefault(),n.stopPropagation(),e.status===t.UPLOADING?t.confirm(i.options.dictCancelUploadConfirmation,function(){return i.removeFile(e)}):i.options.dictRemoveFileConfirmation?t.confirm(i.options.dictRemoveFileConfirmation,function(){return i.removeFile(e)}):i.removeFile(e)}}(this),h=e.previewElement.querySelectorAll("[data-dz-remove]"),m=[],l=0,p=h.length;p>l;l++)r=h[l],m.push(r.addEventListener("click",n));return m}},removedfile:function(e){var t;return e.previewElement&&null!=(t=e.previewElement)&&t.parentNode.removeChild(e.previewElement),this._updateMaxFilesReachedClass()},thumbnail:function(e,t){var i,n,r,o,s;if(e.previewElement){for(e.previewElement.classList.remove("dz-file-preview"),e.previewElement.classList.add("dz-image-preview"),o=e.previewElement.querySelectorAll("[data-dz-thumbnail]"),s=[],n=0,r=o.length;r>n;n++)i=o[n],i.alt=e.name,s.push(i.src=t);return s}},error:function(e,t){var i,n,r,o,s;if(e.previewElement){for(e.previewElement.classList.add("dz-error"),"String"!=typeof t&&t.error&&(t=t.error),o=e.previewElement.querySelectorAll("[data-dz-errormessage]"),s=[],n=0,r=o.length;r>n;n++)i=o[n],s.push(i.textContent=t);return s}},errormultiple:l,processing:function(e){return e.previewElement&&(e.previewElement.classList.add("dz-processing"),e._removeLink)?e._removeLink.textContent=this.options.dictCancelUpload:void 0},processingmultiple:l,uploadprogress:function(e,t,i){var n,r,o,s,l;if(e.previewElement){for(s=e.previewElement.querySelectorAll("[data-dz-uploadprogress]"),l=[],r=0,o=s.length;o>r;r++)n=s[r],l.push("PROGRESS"===n.nodeName?n.value=t:n.style.width=""+t+"%");return l}},totaluploadprogress:l,sending:l,sendingmultiple:l,success:function(e){return e.previewElement?e.previewElement.classList.add("dz-success"):void 0},successmultiple:l,canceled:function(e){return this.emit("error",e,"Upload canceled.")},canceledmultiple:l,complete:function(e){return e._removeLink?e._removeLink.textContent=this.options.dictRemoveFile:void 0},completemultiple:l,maxfilesexceeded:l,maxfilesreached:l,queuecomplete:l,previewTemplate:'<div class="dz-preview dz-file-preview">\n  <div class="dz-details">\n    <div class="dz-filename"><span data-dz-name></span></div>\n    <div class="dz-size" data-dz-size></div>\n    <img data-dz-thumbnail />\n  </div>\n  <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>\n  <div class="dz-success-mark"><span>✔</span></div>\n  <div class="dz-error-mark"><span>✘</span></div>\n  <div class="dz-error-message"><span data-dz-errormessage></span></div>\n</div>'},n=function(){var e,t,i,n,r,o,s;for(n=arguments[0],i=2<=arguments.length?u.call(arguments,1):[],o=0,s=i.length;s>o;o++){t=i[o];for(e in t)r=t[e],n[e]=r}return n},t.prototype.getAcceptedFiles=function(){var e,t,i,n,r;for(n=this.files,r=[],t=0,i=n.length;i>t;t++)e=n[t],e.accepted&&r.push(e);return r},t.prototype.getRejectedFiles=function(){var e,t,i,n,r;for(n=this.files,r=[],t=0,i=n.length;i>t;t++)e=n[t],e.accepted||r.push(e);return r},t.prototype.getFilesWithStatus=function(e){var t,i,n,r,o;for(r=this.files,o=[],i=0,n=r.length;n>i;i++)t=r[i],t.status===e&&o.push(t);return o},t.prototype.getQueuedFiles=function(){return this.getFilesWithStatus(t.QUEUED)},t.prototype.getUploadingFiles=function(){return this.getFilesWithStatus(t.UPLOADING)},t.prototype.getActiveFiles=function(){var e,i,n,r,o;for(r=this.files,o=[],i=0,n=r.length;n>i;i++)e=r[i],(e.status===t.UPLOADING||e.status===t.QUEUED)&&o.push(e);return o},t.prototype.init=function(){var e,i,n,r,o,s,l;for("form"===this.element.tagName&&this.element.setAttribute("enctype","multipart/form-data"),this.element.classList.contains("dropzone")&&!this.element.querySelector(".dz-message")&&this.element.appendChild(t.createElement('<div class="dz-default dz-message"><span>'+this.options.dictDefaultMessage+"</span></div>")),this.clickableElements.length&&(n=function(e){return function(){return e.hiddenFileInput&&document.body.removeChild(e.hiddenFileInput),e.hiddenFileInput=document.createElement("input"),e.hiddenFileInput.setAttribute("type","file"),(null==e.options.maxFiles||e.options.maxFiles>1)&&e.hiddenFileInput.setAttribute("multiple","multiple"),e.hiddenFileInput.className="dz-hidden-input",null!=e.options.acceptedFiles&&e.hiddenFileInput.setAttribute("accept",e.options.acceptedFiles),null!=e.options.capture&&e.hiddenFileInput.setAttribute("capture",e.options.capture),e.hiddenFileInput.style.visibility="hidden",e.hiddenFileInput.style.position="absolute",e.hiddenFileInput.style.top="0",e.hiddenFileInput.style.left="0",e.hiddenFileInput.style.height="0",e.hiddenFileInput.style.width="0",document.body.appendChild(e.hiddenFileInput),e.hiddenFileInput.addEventListener("change",function(){var t,i,r,o;if(i=e.hiddenFileInput.files,i.length)for(r=0,o=i.length;o>r;r++)t=i[r],e.addFile(t);return n()})}}(this))(),this.URL=null!=(s=window.URL)?s:window.webkitURL,l=this.events,r=0,o=l.length;o>r;r++)e=l[r],this.on(e,this.options[e]);return this.on("uploadprogress",function(e){return function(){return e.updateTotalUploadProgress()}}(this)),this.on("removedfile",function(e){return function(){return e.updateTotalUploadProgress()}}(this)),this.on("canceled",function(e){return function(t){return e.emit("complete",t)}}(this)),this.on("complete",function(e){return function(t){return 0===e.getUploadingFiles().length&&0===e.getQueuedFiles().length?setTimeout(function(){return e.emit("queuecomplete")},0):void 0}}(this)),i=function(e){return e.stopPropagation(),e.preventDefault?e.preventDefault():e.returnValue=!1},this.listeners=[{element:this.element,events:{dragstart:function(e){return function(t){return e.emit("dragstart",t)}}(this),dragenter:function(e){return function(t){return i(t),e.emit("dragenter",t)}}(this),dragover:function(e){return function(t){var n;try{n=t.dataTransfer.effectAllowed}catch(r){}return t.dataTransfer.dropEffect="move"===n||"linkMove"===n?"move":"copy",i(t),e.emit("dragover",t)}}(this),dragleave:function(e){return function(t){return e.emit("dragleave",t)}}(this),drop:function(e){return function(t){return i(t),e.drop(t)}}(this),dragend:function(e){return function(t){return e.emit("dragend",t)}}(this)}}],this.clickableElements.forEach(function(e){return function(i){return e.listeners.push({element:i,events:{click:function(n){return i!==e.element||n.target===e.element||t.elementInside(n.target,e.element.querySelector(".dz-message"))?e.hiddenFileInput.click():void 0}}})}}(this)),this.enable(),this.options.init.call(this)},t.prototype.destroy=function(){var e;return this.disable(),this.removeAllFiles(!0),(null!=(e=this.hiddenFileInput)?e.parentNode:void 0)&&(this.hiddenFileInput.parentNode.removeChild(this.hiddenFileInput),this.hiddenFileInput=null),delete this.element.dropzone,t.instances.splice(t.instances.indexOf(this),1)},t.prototype.updateTotalUploadProgress=function(){var e,t,i,n,r,o,s,l;if(n=0,i=0,e=this.getActiveFiles(),e.length){for(l=this.getActiveFiles(),o=0,s=l.length;s>o;o++)t=l[o],n+=t.upload.bytesSent,i+=t.upload.total;r=100*n/i}else r=100;return this.emit("totaluploadprogress",r,i,n)},t.prototype._getParamName=function(e){return"function"==typeof this.options.paramName?this.options.paramName(e):""+this.options.paramName+(this.options.uploadMultiple?"["+e+"]":"")},t.prototype.getFallbackForm=function(){var e,i,n,r;return(e=this.getExistingFallback())?e:(n='<div class="dz-fallback">',this.options.dictFallbackText&&(n+="<p>"+this.options.dictFallbackText+"</p>"),n+='<input type="file" name="'+this._getParamName(0)+'" '+(this.options.uploadMultiple?'multiple="multiple"':void 0)+' /><input type="submit" value="Upload!"></div>',i=t.createElement(n),"FORM"!==this.element.tagName?(r=t.createElement('<form action="'+this.options.url+'" enctype="multipart/form-data" method="'+this.options.method+'"></form>'),r.appendChild(i)):(this.element.setAttribute("enctype","multipart/form-data"),this.element.setAttribute("method",this.options.method)),null!=r?r:i)},t.prototype.getExistingFallback=function(){var e,t,i,n,r,o;for(t=function(e){var t,i,n;for(i=0,n=e.length;n>i;i++)if(t=e[i],/(^| )fallback($| )/.test(t.className))return t},o=["div","form"],n=0,r=o.length;r>n;n++)if(i=o[n],e=t(this.element.getElementsByTagName(i)))return e},t.prototype.setupEventListeners=function(){var e,t,i,n,r,o,s;for(o=this.listeners,s=[],n=0,r=o.length;r>n;n++)e=o[n],s.push(function(){var n,r;n=e.events,r=[];for(t in n)i=n[t],r.push(e.element.addEventListener(t,i,!1));return r}());return s},t.prototype.removeEventListeners=function(){var e,t,i,n,r,o,s;for(o=this.listeners,s=[],n=0,r=o.length;r>n;n++)e=o[n],s.push(function(){var n,r;n=e.events,r=[];for(t in n)i=n[t],r.push(e.element.removeEventListener(t,i,!1));return r}());return s},t.prototype.disable=function(){var e,t,i,n,r;for(this.clickableElements.forEach(function(e){return e.classList.remove("dz-clickable")}),this.removeEventListeners(),n=this.files,r=[],t=0,i=n.length;i>t;t++)e=n[t],r.push(this.cancelUpload(e));return r},t.prototype.enable=function(){return this.clickableElements.forEach(function(e){return e.classList.add("dz-clickable")}),this.setupEventListeners()},t.prototype.filesize=function(e){var t;return e>=109951162777.6?(e/=109951162777.6,t="TiB"):e>=107374182.4?(e/=107374182.4,t="GiB"):e>=104857.6?(e/=104857.6,t="MiB"):e>=102.4?(e/=102.4,t="KiB"):(e=10*e,t="b"),"<strong>"+Math.round(e)/10+"</strong> "+t},t.prototype._updateMaxFilesReachedClass=function(){return null!=this.options.maxFiles&&this.getAcceptedFiles().length>=this.options.maxFiles?(this.getAcceptedFiles().length===this.options.maxFiles&&this.emit("maxfilesreached",this.files),this.element.classList.add("dz-max-files-reached")):this.element.classList.remove("dz-max-files-reached")},t.prototype.drop=function(e){var t,i;e.dataTransfer&&(this.emit("drop",e),t=e.dataTransfer.files,t.length&&(i=e.dataTransfer.items,i&&i.length&&null!=i[0].webkitGetAsEntry?this._addFilesFromItems(i):this.handleFiles(t)))},t.prototype.paste=function(e){var t,i;if(null!=(null!=e&&null!=(i=e.clipboardData)?i.items:void 0))return this.emit("paste",e),t=e.clipboardData.items,t.length?this._addFilesFromItems(t):void 0},t.prototype.handleFiles=function(e){var t,i,n,r;for(r=[],i=0,n=e.length;n>i;i++)t=e[i],r.push(this.addFile(t));return r},t.prototype._addFilesFromItems=function(e){var t,i,n,r,o;for(o=[],n=0,r=e.length;r>n;n++)i=e[n],o.push(null!=i.webkitGetAsEntry&&(t=i.webkitGetAsEntry())?t.isFile?this.addFile(i.getAsFile()):t.isDirectory?this._addFilesFromDirectory(t,t.name):void 0:null!=i.getAsFile?null==i.kind||"file"===i.kind?this.addFile(i.getAsFile()):void 0:void 0);return o},t.prototype._addFilesFromDirectory=function(e,t){var i,n;return i=e.createReader(),n=function(e){return function(i){var n,r,o;for(r=0,o=i.length;o>r;r++)n=i[r],n.isFile?n.file(function(i){return e.options.ignoreHiddenFiles&&"."===i.name.substring(0,1)?void 0:(i.fullPath=""+t+"/"+i.name,e.addFile(i))}):n.isDirectory&&e._addFilesFromDirectory(n,""+t+"/"+n.name)}}(this),i.readEntries(n,function(e){return"undefined"!=typeof console&&null!==console&&"function"==typeof console.log?console.log(e):void 0})},t.prototype.accept=function(e,i){return e.size>1024*this.options.maxFilesize*1024?i(this.options.dictFileTooBig.replace("{{filesize}}",Math.round(e.size/1024/10.24)/100).replace("{{maxFilesize}}",this.options.maxFilesize)):t.isValidFile(e,this.options.acceptedFiles)?null!=this.options.maxFiles&&this.getAcceptedFiles().length>=this.options.maxFiles?(i(this.options.dictMaxFilesExceeded.replace("{{maxFiles}}",this.options.maxFiles)),this.emit("maxfilesexceeded",e)):this.options.accept.call(this,e,i):i(this.options.dictInvalidFileType)},t.prototype.addFile=function(e){return e.upload={progress:0,total:e.size,bytesSent:0},this.files.push(e),e.status=t.ADDED,this.emit("addedfile",e),this._enqueueThumbnail(e),this.accept(e,function(t){return function(i){return i?(e.accepted=!1,t._errorProcessing([e],i)):(e.accepted=!0,t.options.autoQueue&&t.enqueueFile(e)),t._updateMaxFilesReachedClass()}}(this))},t.prototype.enqueueFiles=function(e){var t,i,n;for(i=0,n=e.length;n>i;i++)t=e[i],this.enqueueFile(t);return null},t.prototype.enqueueFile=function(e){if(e.status!==t.ADDED||e.accepted!==!0)throw new Error("This file can't be queued because it has already been processed or was rejected.");return e.status=t.QUEUED,this.options.autoProcessQueue?setTimeout(function(e){return function(){return e.processQueue()}}(this),0):void 0},t.prototype._thumbnailQueue=[],t.prototype._processingThumbnail=!1,t.prototype._enqueueThumbnail=function(e){return this.options.createImageThumbnails&&e.type.match(/image.*/)&&e.size<=1024*this.options.maxThumbnailFilesize*1024?(this._thumbnailQueue.push(e),setTimeout(function(e){return function(){return e._processThumbnailQueue()}}(this),0)):void 0},t.prototype._processThumbnailQueue=function(){return this._processingThumbnail||0===this._thumbnailQueue.length?void 0:(this._processingThumbnail=!0,this.createThumbnail(this._thumbnailQueue.shift(),function(e){return function(){return e._processingThumbnail=!1,e._processThumbnailQueue()}}(this)))},t.prototype.removeFile=function(e){return e.status===t.UPLOADING&&this.cancelUpload(e),this.files=a(this.files,e),this.emit("removedfile",e),0===this.files.length?this.emit("reset"):void 0},t.prototype.removeAllFiles=function(e){var i,n,r,o;for(null==e&&(e=!1),o=this.files.slice(),n=0,r=o.length;r>n;n++)i=o[n],(i.status!==t.UPLOADING||e)&&this.removeFile(i);return null},t.prototype.createThumbnail=function(e,t){var i;return i=new FileReader,i.onload=function(n){return function(){var r;return"image/svg+xml"===e.type?(n.emit("thumbnail",e,i.result),void(null!=t&&t())):(r=document.createElement("img"),r.onload=function(){var i,o,l,a,u,p,d,c;return e.width=r.width,e.height=r.height,l=n.options.resize.call(n,e),null==l.trgWidth&&(l.trgWidth=l.optWidth),null==l.trgHeight&&(l.trgHeight=l.optHeight),i=document.createElement("canvas"),o=i.getContext("2d"),i.width=l.trgWidth,i.height=l.trgHeight,s(o,r,null!=(u=l.srcX)?u:0,null!=(p=l.srcY)?p:0,l.srcWidth,l.srcHeight,null!=(d=l.trgX)?d:0,null!=(c=l.trgY)?c:0,l.trgWidth,l.trgHeight),a=i.toDataURL("image/png"),n.emit("thumbnail",e,a),null!=t?t():void 0},r.src=i.result)}}(this),i.readAsDataURL(e)},t.prototype.processQueue=function(){var e,t,i,n;if(t=this.options.parallelUploads,i=this.getUploadingFiles().length,e=i,!(i>=t)&&(n=this.getQueuedFiles(),n.length>0)){if(this.options.uploadMultiple)return this.processFiles(n.slice(0,t-i));for(;t>e;){if(!n.length)return;this.processFile(n.shift()),e++}}},t.prototype.processFile=function(e){return this.processFiles([e])},t.prototype.processFiles=function(e){var i,n,r;for(n=0,r=e.length;r>n;n++)i=e[n],i.processing=!0,i.status=t.UPLOADING,this.emit("processing",i);return this.options.uploadMultiple&&this.emit("processingmultiple",e),this.uploadFiles(e)},t.prototype._getFilesWithXhr=function(e){var t,i;return i=function(){var i,n,r,o;for(r=this.files,o=[],i=0,n=r.length;n>i;i++)t=r[i],t.xhr===e&&o.push(t);return o}.call(this)},t.prototype.cancelUpload=function(e){var i,n,r,o,s,l,a;if(e.status===t.UPLOADING){for(n=this._getFilesWithXhr(e.xhr),r=0,s=n.length;s>r;r++)i=n[r],i.status=t.CANCELED;for(e.xhr.abort(),o=0,l=n.length;l>o;o++)i=n[o],this.emit("canceled",i);this.options.uploadMultiple&&this.emit("canceledmultiple",n)}else((a=e.status)===t.ADDED||a===t.QUEUED)&&(e.status=t.CANCELED,this.emit("canceled",e),this.options.uploadMultiple&&this.emit("canceledmultiple",[e]));return this.options.autoProcessQueue?this.processQueue():void 0},r=function(){var e,t;return t=arguments[0],e=2<=arguments.length?u.call(arguments,1):[],"function"==typeof t?t.apply(this,e):t},t.prototype.uploadFile=function(e){return this.uploadFiles([e])},t.prototype.uploadFiles=function(e){var i,o,s,l,a,u,p,d,c,h,m,f,g,v,y,F,E,b,w,z,L,C,k,x,A,T,D,_,S,N,U,I,M,R;for(w=new XMLHttpRequest,z=0,x=e.length;x>z;z++)i=e[z],i.xhr=w;f=r(this.options.method,e),E=r(this.options.url,e),w.open(f,E,!0),w.withCredentials=!!this.options.withCredentials,y=null,s=function(t){return function(){var n,r,o;for(o=[],n=0,r=e.length;r>n;n++)i=e[n],o.push(t._errorProcessing(e,y||t.options.dictResponseError.replace("{{statusCode}}",w.status),w));return o}}(this),F=function(t){return function(n){var r,o,s,l,a,u,p,d,c;if(null!=n)for(o=100*n.loaded/n.total,s=0,u=e.length;u>s;s++)i=e[s],i.upload={progress:o,total:n.total,bytesSent:n.loaded};else{for(r=!0,o=100,l=0,p=e.length;p>l;l++)i=e[l],(100!==i.upload.progress||i.upload.bytesSent!==i.upload.total)&&(r=!1),i.upload.progress=o,i.upload.bytesSent=i.upload.total;if(r)return}for(c=[],a=0,d=e.length;d>a;a++)i=e[a],c.push(t.emit("uploadprogress",i,o,i.upload.bytesSent));return c}}(this),w.onload=function(i){return function(n){var r;if(e[0].status!==t.CANCELED&&4===w.readyState){if(y=w.responseText,w.getResponseHeader("content-type")&&~w.getResponseHeader("content-type").indexOf("application/json"))try{y=JSON.parse(y)}catch(o){n=o,y="Invalid JSON response from server."}return F(),200<=(r=w.status)&&300>r?i._finished(e,y,n):s()}}}(this),w.onerror=function(i){return function(){return e[0].status!==t.CANCELED?s():void 0}}(this),v=null!=(S=w.upload)?S:w,v.onprogress=F,u={Accept:"application/json","Cache-Control":"no-cache","X-Requested-With":"XMLHttpRequest"},this.options.headers&&n(u,this.options.headers);for(l in u)a=u[l],w.setRequestHeader(l,a);if(o=new FormData,this.options.params){N=this.options.params;for(m in N)b=N[m],o.append(m,b)}for(L=0,A=e.length;A>L;L++)i=e[L],this.emit("sending",i,w,o);if(this.options.uploadMultiple&&this.emit("sendingmultiple",e,w,o),"FORM"===this.element.tagName)for(U=this.element.querySelectorAll("input, textarea, select, button"),C=0,T=U.length;T>C;C++)if(d=U[C],c=d.getAttribute("name"),h=d.getAttribute("type"),"SELECT"===d.tagName&&d.hasAttribute("multiple"))for(I=d.options,k=0,D=I.length;D>k;k++)g=I[k],g.selected&&o.append(c,g.value);else(!h||"checkbox"!==(M=h.toLowerCase())&&"radio"!==M||d.checked)&&o.append(c,d.value);for(p=_=0,R=e.length-1;R>=0?R>=_:_>=R;p=R>=0?++_:--_)o.append(this._getParamName(p),e[p],e[p].name);return w.send(o)},t.prototype._finished=function(e,i,n){var r,o,s;for(o=0,s=e.length;s>o;o++)r=e[o],r.status=t.SUCCESS,this.emit("success",r,i,n),this.emit("complete",r);return this.options.uploadMultiple&&(this.emit("successmultiple",e,i,n),this.emit("completemultiple",e)),this.options.autoProcessQueue?this.processQueue():void 0},t.prototype._errorProcessing=function(e,i,n){var r,o,s;for(o=0,s=e.length;s>o;o++)r=e[o],r.status=t.ERROR,this.emit("error",r,i,n),this.emit("complete",r);return this.options.uploadMultiple&&(this.emit("errormultiple",e,i,n),this.emit("completemultiple",e)),this.options.autoProcessQueue?this.processQueue():void 0},t}(i),e.version="3.12.0",e.options={},e.optionsForElement=function(t){return t.getAttribute("id")?e.options[n(t.getAttribute("id"))]:void 0},e.instances=[],e.forElement=function(e){if("string"==typeof e&&(e=document.querySelector(e)),null==(null!=e?e.dropzone:void 0))throw new Error("No Dropzone found for given element. This is probably because you're trying to access it before Dropzone had the time to initialize. Use the `init` option to setup any additional observers on your Dropzone.");return e.dropzone},e.autoDiscover=!0,e.discover=function(){var t,i,n,r,o,s;for(document.querySelectorAll?n=document.querySelectorAll(".dropzone"):(n=[],t=function(e){var t,i,r,o;for(o=[],i=0,r=e.length;r>i;i++)t=e[i],o.push(/(^| )dropzone($| )/.test(t.className)?n.push(t):void 0);return o},t(document.getElementsByTagName("div")),t(document.getElementsByTagName("form"))),s=[],r=0,o=n.length;o>r;r++)i=n[r],s.push(e.optionsForElement(i)!==!1?new e(i):void 0);return s},e.blacklistedBrowsers=[/opera.*Macintosh.*version\/12/i],e.isBrowserSupported=function(){var t,i,n,r,o;if(t=!0,window.File&&window.FileReader&&window.FileList&&window.Blob&&window.FormData&&document.querySelector)if("classList"in document.createElement("a"))for(o=e.blacklistedBrowsers,n=0,r=o.length;r>n;n++)i=o[n],i.test(navigator.userAgent)&&(t=!1);else t=!1;else t=!1;return t},a=function(e,t){var i,n,r,o;for(o=[],n=0,r=e.length;r>n;n++)i=e[n],i!==t&&o.push(i);return o},n=function(e){return e.replace(/[\-_](\w)/g,function(e){return e.charAt(1).toUpperCase()})},e.createElement=function(e){var t;return t=document.createElement("div"),t.innerHTML=e,t.childNodes[0]},e.elementInside=function(e,t){if(e===t)return!0;for(;e=e.parentNode;)if(e===t)return!0;return!1},e.getElement=function(e,t){var i;if("string"==typeof e?i=document.querySelector(e):null!=e.nodeType&&(i=e),null==i)throw new Error("Invalid `"+t+"` option provided. Please provide a CSS selector or a plain HTML element.");return i},e.getElements=function(e,t){var i,n,r,o,s,l,a,u;if(e instanceof Array){r=[];try{for(o=0,l=e.length;l>o;o++)n=e[o],r.push(this.getElement(n,t))}catch(p){i=p,r=null}}else if("string"==typeof e)for(r=[],u=document.querySelectorAll(e),s=0,a=u.length;a>s;s++)n=u[s],r.push(n);else null!=e.nodeType&&(r=[e]);if(null==r||!r.length)throw new Error("Invalid `"+t+"` option provided. Please provide a CSS selector, a plain HTML element or a list of those.");return r},e.confirm=function(e,t,i){return window.confirm(e)?t():null!=i?i():void 0},e.isValidFile=function(e,t){var i,n,r,o,s;if(!t)return!0;for(t=t.split(","),n=e.type,i=n.replace(/\/.*$/,""),o=0,s=t.length;s>o;o++)if(r=t[o],r=r.trim(),"."===r.charAt(0)){if(-1!==e.name.toLowerCase().indexOf(r.toLowerCase(),e.name.length-r.length))return!0}else if(/\/\*$/.test(r)){if(i===r.replace(/\/.*$/,""))return!0}else if(n===r)return!0;return!1},"undefined"!=typeof jQuery&&null!==jQuery&&(jQuery.fn.dropzone=function(t){return this.each(function(){return new e(this,t)})}),"undefined"!=typeof t&&null!==t?t.exports=e:window.Dropzone=e,e.ADDED="added",e.QUEUED="queued",e.ACCEPTED=e.QUEUED,e.UPLOADING="uploading",e.PROCESSING=e.UPLOADING,e.CANCELED="canceled",e.ERROR="error",e.SUCCESS="success",o=function(e){var t,i,n,r,o,s,l,a,u,p;for(l=e.naturalWidth,s=e.naturalHeight,i=document.createElement("canvas"),i.width=1,i.height=s,n=i.getContext("2d"),n.drawImage(e,0,0),r=n.getImageData(0,0,1,s).data,p=0,o=s,a=s;a>p;)t=r[4*(a-1)+3],0===t?o=a:p=a,a=o+p>>1;return u=a/s,0===u?1:u},s=function(e,t,i,n,r,s,l,a,u,p){var d;return d=o(t),e.drawImage(t,i,n,r,s,l,a,u,p/d)},r=function(e,t){var i,n,r,o,s,l,a,u,p;if(r=!1,p=!0,n=e.document,u=n.documentElement,i=n.addEventListener?"addEventListener":"attachEvent",a=n.addEventListener?"removeEventListener":"detachEvent",l=n.addEventListener?"":"on",o=function(i){return"readystatechange"!==i.type||"complete"===n.readyState?(("load"===i.type?e:n)[a](l+i.type,o,!1),!r&&(r=!0)?t.call(e,i.type||i):void 0):void 0},s=function(){var e;try{u.doScroll("left")}catch(t){return e=t,void setTimeout(s,50)}return o("poll")},"complete"!==n.readyState){if(n.createEventObject&&u.doScroll){try{p=!e.frameElement}catch(d){}p&&s()}return n[i](l+"DOMContentLoaded",o,!1),n[i](l+"readystatechange",o,!1),e[i](l+"load",o,!1)}},e._autoDiscoverFunction=function(){return e.autoDiscover?e.discover():void 0},r(window,e._autoDiscoverFunction)}).call(this)}),"object"==typeof exports?module.exports=e("dropzone"):"function"==typeof define&&define.amd?define([],function(){return e("dropzone")}):this.Dropzone=e("dropzone")}();