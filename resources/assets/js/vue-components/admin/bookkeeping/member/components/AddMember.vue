<template> 
	<div class="row">
		<div class="col-md-12">
			<div class="card text-center">
				<div class="col-md-12">
					<h4 class="title mb-5">Add New <strong>Member Data</strong></h4>
				</div>

				<div class="col-md-12 d-flex">
					<div class="col-md-6">
						<div class="form-group text-center mb-3">
							<input type="text" 
							v-model="input.name"
							@input="$v.input.name.$touch()"
							class="form-control" id="name-member" 
							:class="{'form-control-danger': $v.input.name.$error}"
							placeholder="Name">

							<!--======================================================================================
                            	V A L I D A T I O N     E R R O R   M E S S A G E S
                            	======================================================================================-->
                    		<transition enterActiveClass="fade-in" leaveActiveClass="fade-out" mode="out-in">
                            	<span key="name-required" class="text-danger" 
                            	v-if="!$v.input.name.required && $v.input.name.$dirty">
                            		Name is required
                        		</span>
                            	<span key="Name-minimum" class="text-danger" 
                            	v-else-if="!$v.input.name.minLength">
                            		Name has a minimum of {{ $v.input.name.$params.minLength.min }} characters
                            	</span>
                            	<span key="key-maximum" class="text-danger" 
                            	v-else-if="!$v.input.name.maxLength">
                            		Name has a maximum of {{ $v.input.name.$params.maxLength.max }} characters
                        		</span>
                    		</transition>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group text-center mb-3">
							<input type="radio" name="gender"  
								   value=1 v-model="input.gender"> Male
							<input type="radio" name="gender"  
							       value=0 v-model="input.gender" class="ml-2"> Female
						</div>

						<!--======================================================================================
							V A L I D A T I O N     E R R O R   M E S S A G E S
							======================================================================================-->
						<transition enterActiveClass="fade-in" leaveActiveClass="fade-out" mode="out-in">
							<span key="gender-required" class="text-danger" 
							v-if="!$v.input.gender.required && $v.input.gender.$dirty">
								Gender is required
							</span>
						</transition>
					</div>
				</div>

				<div class="col-md-12 d-flex">
					<div class="col-md-6">
						<div class="form-group text-center mb-3">
							<input type="text" 
							v-model="input.place_of_birth"
							@input="$v.input.place_of_birth.$touch()"
							class="form-control" id="place_of_birth"
							:class="{'form-control-danger': $v.input.place_of_birth.$error}"
							placeholder="Place of Birth">

							<!--======================================================================================
                            	V A L I D A T I O N     E R R O R   M E S S A G E S
                            	======================================================================================-->
                    		<transition enterActiveClass="fade-in" leaveActiveClass="fade-out" mode="out-in">
                            	<span key="place_of_birth-required" class="text-danger" 
                            	v-if="!$v.input.place_of_birth.required && $v.input.place_of_birth.$dirty">
                            		Place of birth is required
                        		</span>
                    		</transition>
						</div>
					</div>


					<div class="col-md-6">
						<div class="form-group text-center mb-3">
							<datetime type="date" id="date_of_birth" 
							v-model="input.date_of_birth" 
							@input="$v.input.date_of_birth.$touch()"
							:class="{'form-control-danger': $v.input.date_of_birth.$error}"
							placeholder="Date of Birth">
							</datetime>

							<!--======================================================================================
                            	V A L I D A T I O N     E R R O R   M E S S A G E S
                            	======================================================================================-->
                    		<transition enterActiveClass="fade-in" leaveActiveClass="fade-out" mode="out-in">
                            	<span key="end-required" class="text-danger" 
                            	v-if="!$v.input.date_of_birth.required && $v.input.date_of_birth.$dirty">
                            		Date of birth is required
                        		</span>
                    		</transition>
						</div>
					</div>
				</div>

				<div class="col-md-12 d-flex">
					<div class="col-md-6">
						<div class="form-group text-center mb-3">
							<input type="text" 
							v-model="input.email"
							@input="$v.input.email.$touch()"
							:class="{'form-control-danger': $v.input.email.$error}"
							class="form-control" id="email" 
							placeholder="Email">

							<!--======================================================================================
                            	V A L I D A T I O N     E R R O R   M E S S A G E S
                            	======================================================================================-->
                    		<transition enterActiveClass="fade-in" leaveActiveClass="fade-out" mode="out-in">
                            	<span key="email-required" class="text-danger" 
                            	v-if="!$v.input.email.required && $v.input.email.$dirty">
                            		Email is required
                        		</span>
                            	<span key="email-minimum" class="text-danger" 
                            	v-else-if="!$v.input.email.minLength">
                            		Email has a minimum of {{ $v.input.email.$params.minLength.min }} characters
                            	</span>
                            	<span key="email-maximum" class="text-danger" 
                            	v-else-if="!$v.input.email.maxLength">
                            		Email has a maximum of {{ $v.input.email.$params.maxLength.max }} characters
                        		</span>
                    		</transition>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group text-center mb-3">
							<input type="text" 
							v-model="input.fax" 
							class="form-control" id="fax"
							placeholder="Fax">
						</div>
					</div>
				</div>

				<div class="col-md-12 d-flex">
					<div class="col-md-12">
						<div class="form-group text-center mb-3">
							<input type="text" 
							v-model="input.address"
							@input="$v.input.address.$touch()"
							:class="{'form-control-danger': $v.input.address.$error}"
							class="form-control" id="address" 
							placeholder="Address">

							<!--======================================================================================
                            	V A L I D A T I O N     E R R O R   M E S S A G E S
                            	======================================================================================-->
                    		<transition enterActiveClass="fade-in" leaveActiveClass="fade-out" mode="out-in">
                            	<span key="address-required" class="text-danger" 
                            	v-if="!$v.input.address.required && $v.input.address.$dirty">
                            		Address is required
                        		</span>
                    		</transition>
						</div>
					</div>
				</div>

				<div class="col-md-12 d-flex">
					<div class="col-md-6">
						<div class="form-group text-center mb-3">
							<input type="text" 
							v-model="input.telephone"
							@input="$v.input.telephone.$touch()"
							:class="{'form-control-danger': $v.input.telephone.$error}"
							class="form-control" id="telephone" 
							placeholder="Telephone">

							<!--======================================================================================
                            	V A L I D A T I O N     E R R O R   M E S S A G E S
                            	======================================================================================-->
                    		<transition enterActiveClass="fade-in" leaveActiveClass="fade-out" mode="out-in">
                            	<span key="telephone-required" class="text-danger" 
                            	v-if="!$v.input.telephone.required && $v.input.telephone.$dirty">
                            		Telephone is required
                        		</span>
                    		</transition>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group text-center mb-3">
							<input type="text" 
							v-model="input.mobile" 
							class="form-control" id="mobile"
							placeholder="Mobile">
						</div>
					</div>
				</div>

				<div class="col-md-12 d-flex">
					<div class="col-md-6">
						<div class="form-group">
							<select class="form-control" id="category" 
									v-model="input.teacher_id">
								<option value="" disabled="">Choose Teacher</option>
								<option v-for="member in members" 
										:value=member.id>{{ member.name }}
								</option>
							</select>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group text-center mb-3">
							<datetime type="date" id="join_birth" 
									  v-model="input.join_date"
									  placeholder="Join Date">
							</datetime>
						</div>
					</div>
				</div>

				<div class="col-md-12 d-flex">
					<div class="col-md-6">
						<div class="form-group text-center mb-3">
							<input type="radio" name="member_teacher-add"  
								   value=0 v-model="input.is_teacher"> Student
							<input type="radio" name="member_teacher-add"  
							       value=1 v-model="input.is_teacher" class="ml-2"> Teacher
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group text-center mb-3">
							<input type="radio" name="member-starus-add"  
								   value=1 v-model="input.is_active"> Active
							<input type="radio" name="member-starus-add"  
							       value=0 v-model="input.is_active" class="ml-2"> Not Active
						</div>
					</div>
				</div>
			</div>

			<div class="card text-center">
				<div class="col-md-12">
					<h4 class="title mb-5">Add <strong>Classes</strong></h4>
				</div>
				<div class="col-md-12 d-flex">
					<div class="col-md-12">
						<select class="form-control" id="class-list"
								:class="{'form-control-danger':isHasClass }"
							    v-model="classItem">
				    	<option value='' disabled="">Choose Class</option>
					    <option v-for="item in classList" :value=item>{{ item.title }}</option>
					   </select>
					   <!--======================================================================================
                        	V A L I D A T I O N     E R R O R   M E S S A G E S
                        	======================================================================================-->
                			<transition enterActiveClass="fade-in" leaveActiveClass="fade-out" mode="out-in">
                        		<span class="text-danger" v-if="isHasClass">
                        		  	Class is required
                    			</span>
                			</transition>
					</div>
				</div>

				<div class="col-md-12 d-flex justify-content-center">
					<transition-group enterActiveClass="fade-in" leaveActiveClass="fade-out" mode="out-in">
						<div :key="'chosen-class-' + index" v-for="(list, index) in classData" style="display: inline-block">
							<p class="mr-3 mb-0 d-flex align-items-center">{{ list.title }}
								<span @click="delete_class(index)" 
								class="badge badge-danger ml-1" 
								style="cursor: pointer">
									X
								</span> 
							</p>
						</div>
					</transition-group>
				</div>

				<div class="col-md-12 d-flex justify-content-center mt-2">
					<button type="button" @click="add_class" class="btn btn-success btn-sm">
						Add Class
					</button>
				</div>
			</div>
			
			<transition enterActiveClass="fade-in" leaveActiveClass="fade-out" mode="out-in">
			<div class="card text-center" v-if="hasIkebana">
				<div class="col-md-12"><h4 class="title mb-5">Add <strong>Ranks</strong></h4></div>

				<transition-group class="col-12 p-0" name="slide">
					<div class="col-md-12 d-flex mb-2" v-for="(rank, index) in rankData" :key="index">
						<div class="col-md-3 col-sm-5 d-flex justify-content-center align-items-center">
							<p class="m-0"> {{rank.title}}  </p>
						</div>
						<div class="col-md-8 col-sm-5">
							<datetime type="date" v-model="rankData[index].annointed_date"></datetime>
						</div>
						<div class="col-md-1 col-sm-2 d-flex justify-content-center align-items-center" v-if="index == (limit - 1)">
							<button class="btn btn-danger btn-sm" @click="delete_rank(index)">Delete</button>
						</div>
					</div>
				</transition-group>

				<transition-group class="col-12 p-0" name="slide">
					<div v-for="(rank, index) in ranks" v-if="index == limit" class="col-md-12 mb-2 d-flex justify-content-center" :key="index">
						<div class="col-md-3 col-sm-5 d-flex justify-content-center align-items-center">
							<p class="m-0"> {{rank.title}} </p>
						</div>
						<div class="col-md-8 col-sm-5">
							<datetime type="date" v-model="temp_annointed_date" placeholder="Starting Date"></datetime>
						</div>
						<div class="col-md-1 col-sm-2 d-flex justify-content-center align-items-center">
							<button class="btn btn-success btn-sm" @click="add_rank(index)">Add</button>
						</div>
					</div>
				</transition-group>
			</div>
			</transition>
				
			<transition enterActiveClass="fade-in" leaveActiveClass="fade-out" mode="out-in">
			<div class="card text-center" v-if="hasIkebana">
				<div class="col-md-12"><h4 class="title mb-5">Add <strong>Subscription Records</strong></h4></div>

				<div class="col-md-12 d-flex">
					<div class="col-md-12">
						<input type="number" 
						@input="$v.year.$touch()"
						class="form-control" 
						:class="{'form-control-danger': $v.year.$error || alreadyHasYears}"
						placeholder="Input Years" v-model="year">

						<!--======================================================================================
							V A L I D A T I O N     E R R O R   M E S S A G E S
							======================================================================================-->
						<transition-group enterActiveClass="fade-in" leaveActiveClass="fade-out" mode="out-in">
							<span key="min-years" class="text-danger" v-if="!$v.year.minLength">
								Year must has of {{ $v.year.$params.minLength.min }} characters
							</span>
							<span key="max-years" class="text-danger" v-else-if="!$v.year.maxLength">
								Year must has of {{ $v.year.$params.maxLength.max }} characters
							</span>
							<span key="duplicate-year" class="text-danger" v-else-if="alreadyHasYears">
								Can't input same year
							</span>
						</transition-group>
					</div>
				</div>

				<div class="col-md-12 row mr-0 ml-0 mt-4 mb-2" v-if="subscription.length > 0">
					<transition-group class="col-12 row m-0" 
									  appear enterActiveClass="fade-in" 
									  leaveActiveClass="fade-out" mode="out-in">
						
						<div v-for="(list, index) in subscriptions"
							 class="mr-2 mb-2"
							 :key="'subscription-year-' + index" 
							 style="border: 1px #908f96 solid; padding: 2px 6px; color: #6d6c73">
                                   {{ list }}
                                    <span @click="delete_year(index)" 
									      class="badge badge-danger btn"> X </span>
                        </div>
					</transition-group>
				</div>

				<div class="col-md-12 d-flex justify-content-center mt-2">
					<button class="btn btn-success btn-sm" @click="add_subscription()">Add Subscription Year</button>
				</div>
			</div>
			</transition> 

			<div class="card text-center">
				<div class="col-md-12">
					<h4 class="title mb-5">Add <strong>Class Regions</strong></h4>
				</div>
				<div class="col-md-12 d-flex">
					<div class="col-md-12">
						<select class="form-control" id="class-region" v-model="region">
							<option value='' disabled="">Choose Class Region</option>
							<option v-for="region in regions" :value=region>{{ region.name }}</option>
						</select>
					</div>
				</div>

				<div class="col-md-12 d-flex justify-content-center">
					<transition-group enterActiveClass="fade-in" leaveActiveClass="fade-out" mode="out-in">
						<div :key="'class-region-' + index" v-for="(list, index) in classRegion" style="display: inline-block">
							<p class="mr-3 mb-0 d-flex align-items-center">{{ list.name }}
								<span @click="delete_region(index)" 
								class="badge badge-danger ml-1" 
								style="cursor: pointer">
									X
								</span> 
							</p>
						</div>
					</transition-group>
				</div>

				<div class="col-md-12 d-flex justify-content-center mt-2">
					<button type="button" @click="add_region" class="btn btn-success btn-sm">
						Add Class Region
					</button>
				</div>
			</div>

			<div class="card text-center">
				<div class="col-md-12">
					<div class="col-md-12 d-flex justify-content-center">
						<button type="button" @click="closeAddMember" class="btn btn-sm btn-warning">
							Cancel
						</button>
						<button type="button" @click="addMember" 
								class="btn btn-sm btn-success ml-1" :disabled="isRequesting">
							<template v-if="isRequesting">Adding..</template>
							<template v-else>Add Member</template>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
	import {required, minLength, maxLength} from 'vuelidate/lib/validators';
	import {mapGetters} from 'vuex';
	import 'vue-datetime/dist/vue-datetime.css';
	import {Datetime} from 'vue-datetime';
    Vue.use(Datetime)

	export default{
		data(){
			return{
				isHasClass: false,
				isRequesting: false,
				limit: 0,
				rankData:[],
				temp_annointed_date: '',
				subscription:[],
				year: '',
				classRegion:[],
				region: '',
				classData:[],
				classItem: '',
				input:{
					name: '',
					gender: '',
					place_of_birth: '',
					date_of_birth: '',
					address: '',
					join_date: '',
					email: '',
					telephone: '',
					mobile: '',
					fax: '',
					teacher_id: '',
					gender: '1',
					is_teacher: '0',
					is_active: '1'
				}
			}
		},

		mounted() {
			this.$v.$reset();
		},

		validations: {
            input: {
                name: {
                    required,
                    minLength: minLength(3),
                    maxLength: maxLength(50)
                },
                gender:{
                	required,
                },
                place_of_birth: {
                    required,
                },
                address: {
                	required,
                },
                date_of_birth: {
                	required,
                },
                email:{
                	required,
                	minLength: minLength(3),
                	maxLength: maxLength(50)
                },
                telephone:{
                	required,
                }
            },
            tempName:{
            	required,
            },
            year:{
            	maxLength: maxLength(4),
            	minLength: minLength(4)
            },
            classData:{
            	required
            }
        },

		components:{
			Datetime
		},

		computed:{
			...mapGetters({
				classList: 'getClass',
				ranks: 'getRanks',
				regions: 'getRegions',
				members: 'getTeachers'
			}),

			formAddFilled(){
				return this.input.name != ''
					&& this.input.name.length >= 3
					&& this.input.name.length <= 50
					&& this.input.gender != ''
					&& this.input.place_of_birth != ''
					&& this.input.address != ''
					&& this.input.email != ''
					&& this.input.email.length >= 3
					&& this.input.email.length <= 50
					&& this.input.telephone != ''
					&& this.classData != '';
			},

			hasIkebana(){
				return _.some(this.classData, ['title', 'Ikebana Ikenobo']);
			},

			alreadyHasYears(){

				if(this.year.length != 4){
					return false;
				}

				for(let index = 0; index < this.subscription.length; index++){
					if(this.subscription[index] == this.year){
						return true;
					}
				}
			},

			subscriptions(){
				return this.subscription.sort();
			}
		},

		methods:{

			addMember(){

				let self = this;
				
				if(self.formAddFilled && !self.isRequesting){

					self.isRequesting = true;

					const name = this.input.name;

					const dataMember = {
						personal: this.input,
						ranks: this.rankData,
						subscription: this.subscription,
						region: this.classRegion,
						classes: this.classData
					};

					this.$store.dispatch('store_new_member',dataMember)
                        .then(() => {
                            flash(name + ' is successfully added','success');

                            self.isRequesting = false;

                            self.setData();

                            self.closeAddMember();
                        })
                        .catch(errors => {

                        	self.isRequesting = false;

                            Object.keys(errors).forEach(field=> {
                                errors[field].forEach(message=> {
                                    flash(message, 'danger', 5000);
                                })
                            })
                        });
				}
				else {
					this.dirtyAllInputs();
				}
			},

			add_class(){

				if(this.classItem != ''){

					this.classData.push(this.classItem);

					const classIndex = _.findIndex(this.classList,['id', this.classItem.id]);

					this.classList.splice(classIndex, 1);

					this.classItem = '';
				}
			},

			delete_class(index){

				this.classList.push(this.classData[index]);

				this.classData.splice(index, 1);

			},

			add_region(){
				if(this.region != ''){
					this.classRegion.push(this.region);

					const regionIndex = _.findIndex(this.regions,['id', this.region.id]);

					this.regions.splice(regionIndex, 1);

					this.region = '';
				}
			},

			delete_region(index){

				this.regions.push(this.classRegion[index]);

				this.classRegion.splice(index, 1);
			},

			add_subscription(){
				if(this.year != '' && this.year.length == 4 && !this.alreadyHasYears){
					this.subscription.push(this.year);
					this.year = '';
				}
			},

			delete_year(index){
				this.subscription.splice(index, 1);
			},

			add_rank(index){
				if(this.temp_annointed_date != ''){
					this.rankData.push({
						title: this.ranks[index].title,
						rankId: this.ranks[index].id,
						annointed_date: this.temp_annointed_date
					});
					this.limit += 1;

					this.temp_annointed_date = '';
				}
			},

			delete_rank(index){
				this.rankData.splice(index, 1);
				this.limit -= 1;
			},

			setData(){
				this.input.name = '';
				this.input.gender = '';
				this.input.place_of_birth = '';
				this.input.date_of_birth = '';
				this.input.join_date = '';
				this.input.email = '';
				this.input.telephone = '';
				this.input.mobile = '';
				this.input.fax = '';
				this.input.teacher_id = '';
				this.subscription = [];
				this.rankData = [];
				this.classData = [];
				this.classRegion = [];
			},

			dirtyAllInputs(){

				if(this.classData.length == 0){
					this.isHasClass = true;
				}

                this.$v.input.name.$touch();
                this.$v.input.gender.$touch();
                this.$v.input.place_of_birth.$touch();
                this.$v.input.date_of_birth.$touch();
                this.$v.input.address.$touch();
                this.$v.input.email.$touch();
                this.$v.input.telephone.$touch();
                this.$v.classData.$touch();
			},

			closeAddMember(){
	           this.$emit('closeAddMember',false);
	        }
		},

		watch:{
			classData(){
				if(this.classData.length >= 1){
					this.isHasClass = false
				}
			},

			hasIkebana(){
				if(!this.hasIkebana){
					this.subscription = [],
					this.rankData = [],
					this.limit = 0
				}
			}
		}
	};
</script>

<style type="text/css">
	.vdatetime-input {
        width: 100%;
        padding: .375rem .75rem;
        line-height: 1.5;
        font-size: 1rem;
        color: #495057;
        border-radius: .25rem;
        border: 1px solid #ced4da;
    }

    ::-webkit-input-placeholder {
   		text-align: center;
	}

	:-moz-placeholder { /* Firefox 18- */
   		text-align: center;  
	}

	::-moz-placeholder {  /* Firefox 19+ */
   		text-align: center;  
	}

	:-ms-input-placeholder {  
   		text-align: center; 
	}

	input {
		text-align: center;
	}

	select {
  		text-align: center;
  		text-align-last: center;
  		/* webkit*/
	}

	option {
  		text-align: left;
	}

	.normal-placeholder::-webkit-input-placeholder,
    .normal-placeholder:-moz-placeholder,
    .normal-placeholder::-moz-placeholder,
    .normal-placeholder:-ms-input-placeholder {
        text-align: left !important;
    }

    .form-control-danger input {
    	border-color: #dc3545 !important;
    }

    .form-control-danger input:focus {
    	border-color: #dc3545 !important;
    	box-shadow: 0 0 0 0.2rem rgba(220,53,69,.25) !important;
    }
</style>

<style scoped type="text/css">
	.card {
		flex-direction: unset;
		display: flex;
		flex-wrap: wrap;
		width: 100%;
		padding: 36px 10px 26px 10px;
	}

	.slide-enter {
	  opacity: 0;
	}

	.slide-enter-active {
	  animation: slide-in 0.6s ease;
	  transition: opacity 0.6s;
	}

	.slide-leave {
	}

	.slide-leave-active {
	  animation: slide-out 0.6s ease forwards;
	  transition: opacity 0.6s;
	  opacity: 0;
	  position: absolute;
	  width: 100%;
	}

	.slide-move {
	  transition: transform 0.6s;
	}

	@keyframes slide-in {
	  from {
	      transform: translateY(-20px);
	  }
	  to {
	      background-color: white;
	      transform: translateY(0px);
	  }
	}

	@keyframes slide-out {
	  from {
	      transform: translateY(0);
	  }
	  to {
	      transform: translateY(-20px);
	  }
	}
</style>