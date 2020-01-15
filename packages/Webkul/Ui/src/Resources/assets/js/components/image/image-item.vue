<template>
    <label class="image-item" :for="_uid" :class="[sizeClass, hasImage]">
        <input type="hidden" :name="finalInputName"/>

        <input type="file" v-validate="'mimes:image/*'" accept="image/*" :name="finalInputName" ref="imageInput" :id="_uid" @change="addImageView($event)"/>

        <img class="preview" :class="[sizeClass]" :src="imageData" v-if="imageData.length > 0">

        <label class="remove-image" @click="removeImage()">{{ removeButtonLabel }}</label>
    </label>
</template>

<script>
    export default {
        props: {
            inputName: {
                type: String,
                required: false,
                default: 'attachments'
            },

            removeButtonLabel: {
                type: String,
            },

            image: {
                type: Object,
                required: false,
                default: null
            },

            size: {
              type: String,
              required: false,
              default: ''
            }
        },

        data: function() {
            return {
                imageData: ''
            }
        },

        mounted () {
            if(this.image.id && this.image.url) {
                this.imageData = this.image.url;
            }
        },

        computed: {
            finalInputName () {
                return this.inputName + '[' + this.image.id + ']';
            },
            sizeClass() {
              if (!this.size)
                return '';
              return this.size;
            },
            hasImage() {
                if (this.imageData.length > 0 )
                  return 'has-image';
                return '';
            }
        },

        methods: {
            addImageView () {
                var imageInput = this.$refs.imageInput;

                if (imageInput.files && imageInput.files[0]) {
                    if(imageInput.files[0].type.includes('image/')) {
                        var reader = new FileReader();

                        reader.onload = (e) => {
                            var image = new Image;
                            image.onload = () => {
                                if (this.$parent.enforceSquare) {
                                    if ((image.width === image.height)) {
                                        this.imageData = e.target.result;
                                    } else {
                                        alert('Unable to upload image!  Ideal photo dimensions should be square (same width and height).');
                                    }
                                } else {
                                    this.imageData = e.target.result;
                                }
                            }
                            image.src = reader.result;
                        }

                        reader.readAsDataURL(imageInput.files[0]);
                    } else {
                        imageInput.value = "";
                        alert('Only images (.jpeg, .jpg, .png, ..) are allowed.');
                    }
                }
            },

            removeImage () {
                this.$emit('onRemoveImage', this.image)
            },
        }
    }
</script>

<style>
  .min-small {
    width: 200px !important;
    height: 133px !important;
  }
    .small{
        width: 100px !important;
        height: 100px !important;
    }
    .large {
      width: 500px !important;
      height: 200px !important;
    }
  .ex-large {
    width: 523px !important;
    height: 200px !important;
  }
</style>
