<template>
    <transition enterActiveClass="fade-in-down"
                leaveActiveClass="fade-out-up"
                mode="out-in">
        <div class="panel-default panel mt-3 pt-4 bg-grey" id="edit_image">
            <div class="panel-body">
                <h3 class="text-center font-weight-bold">Edit {{ imageItem.title }}</h3>

                <div class="row pl-0 pr-0 m-0 pt-4 pb-4">
                    <div class="col-md-4">
                        <div :id="'croppie-' + imageItem.id"></div>

                        <div class="panel panel-transparent text-center">
                            <input type="file"
                            accept="image/*"
                            id="file-2"
                            class="inputfile"
                            @change="setUpFileUploader">

                            <label for="file-2" class="btn btn-primary pt-1 pb-1 pr-2 pl-2">
                                <span>Browse Image</span>
                            </label>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="col-sm-12 row form-group">
                            <div class="col-sm-3 col-xs-12 d-flex align-items-center justify-content-end">
                                <label for="title"
                                class="form-control-label panel-font-small m-0 font-weight-bold">
                                    Nama
                                </label>
                            </div>

                            <div class="col-sm-9 col-xs-12">
                                <input id="title"
                                type="text"
                                class="form-control form-control-sm"
                                @keyup.enter="editImage"
                                placeholder="Nama Gambar" 
                                v-model="input.title">
                            </div>
                        </div>

                        <div class="col-sm-4 offset-3 d-flex justify-content-start mt-3 pl-2">
                            <button type="button" 
                            class="btn btn-secondary btn-sm"
                            @click="closeEditForm">
                                Batal
                            </button>

                            <button @click="editImage"
                            class="btn btn-success btn-sm ml-2">
                                Simpan
                            </button>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
    import {mapGetters} from 'vuex';
    import {Croppie} from 'croppie';
    export default{

        props: {
            imageItem: {
                type: [Object],
                default() {
                    return {}
                }
            }
        },

        data(){
            return {
                isRequesting: false,
                save_image: '',
                input:{
                    title : this.imageItem.title,
                    image : this.imageItem.image_path,
                    description : this.imageItem.description,
                }
            }   
        },

        mounted(){
            this.setUpCroppie();
        },

        computed: {

            imageIsEdited(){
                return this.imageItem.title !== this.input.title
                    || this.imageItem.image_path !== this.input.image;
            },
        },

        methods: {

            setUpFileUploader(event){
                let files = event.target.files || event.dataTransfer.files;

                if(!files.length){
                    return
                }

                this.createImage(files[0]);
            },

            createImage(file){
                const reader = new FileReader();
                const vm  = this;

                reader.onload = (event) => {
                    vm.input.image = event.target.result;
                    this.croppie.destroy();
                    this.setUpCroppie();
                };

                reader.readAsDataURL(file);
            },

             setUpCroppie(){
                const vm = this;
                let file = document.getElementById('croppie-' + this.imageItem.id);

                this.croppie = new Croppie(file,{
                    viewport: {width: 235, height: 300, type: 'square'},
                    boundary: {width: 285, height: 350 },
                    enableOrientation: false
                });

                if(this.input.image === null || this.input.image === ''){
                    this.croppie.bind({
                        url: 'https://static.wixstatic.com/media/b77fe464cfc445da9003a5383a3e1acf.jpg'
                    });
                }else {
                    this.croppie.bind({
                        url: this.input.image
                    });
                }

                this.croppie.options.update = function(){
                    vm.setImage();
                }
            },

            setImage(){
                const vm = this;

                this.croppie.result({
                    type: 'canvas',
                    size: {witdh: 470, height:600, type: 'square'},
                }).then(response => {
                    vm.save_image = response;
                });
            },


            editImage(){

                const self = this;

                if (this.imageIsEdited) {

                    this.isRequesting = true;

                    const updatedImage = {
                        id: this.imageItem.id,
                        title: this.input.title,
                        image: this.input.image === this.imageItem.image_path ? this.input.image : this.save_image,
                        is_poster: this.imageItem.is_poster
                    };

                    this.$store.dispatch('update_image', updatedImage)

                        .then((updatedImage) => {

                            flash('Image item Berhasil diperbaharui', 'success');

                            self.closeEditForm();
                        })
                        .catch(errors => {
                            self.isRequesting = false;
                        });
                }
            },

            closeEditForm() {
                this.$emit('editionFormIsClosed', false);
            }
        },
    };
</script>

<style>
    .croppie-container {
        height: unset !important;
    }
</style>

<style scoped>

    .bg-grey {
        background: #fafafa;
    }

    .panel-font-small {
        font-size: 0.9rem;
    }

    input[type='file']::-webkit-file-upload-button
    {
        color: #fff;
        background-color: #34495e;
        border: none;
        padding: 5px;
        border-radius: 5px;
    }

    .inputfile {
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1; 
    }
    .inputfile + label {
        padding: 0.81rem 0.7692rem;
        display: inline-block;
        cursor: pointer; 
    }
    .inputfile + label i {
        margin-right: 10px; 
    }
</style>