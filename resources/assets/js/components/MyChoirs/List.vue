<template>
     <div>
        <v-toolbar color="pink">
            <v-toolbar-title class="white--text">
                MY CHOIRS
            </v-toolbar-title>
            <v-spacer></v-spacer>
            <v-btn icon><v-icon>search</v-icon></v-btn>
        </v-toolbar>
        <v-expansion-panel>
            <v-expansion-panel-content v-for="choir in getChoirs" :key="choir.id">
                <div slot="header">{{ choir.name }}</div>
                 <v-card color="blue-grey darken-2" class="white--text choir-card">
                            <v-card-title primary-title  @click="detail(choir.id)">
                                <div>
                                    <div class="headline">{{ choir.name }}</div>
                                    <div>{{ choir.description }}</div>
                                </div>
                            </v-card-title>
                            
                                <v-card-actions v-if="isUserAdmin(choir.id)">
                                    <v-spacer></v-spacer>
                                    <a :href="getEditChoirUrl(choir)">
                                        
                                        ADMIN
                                        <v-btn icon>
                                            <v-icon large light color="white">edit</v-icon>
                                        </v-btn>
                                    </a>
                                </v-card-actions>
                        </v-card>
            </v-expansion-panel-content>
        </v-expansion-panel>
    </div>
</template>

<style lang="scss" scoped>
.choir-card:hover {
  background-color: #546e7a !important;
}
</style>
>
</style>

<script>
const self = this;

export default {
  props: {
    type: String
  },
  computed: {
    getChoirs() {
      return this.$store.state.choirsMember;
    }
  },
  methods: {
    isUserAdmin(choirId) {
      return this.$store.getters.isUserAdmin(choirId);
    },
    getEditChoirUrl: choir => {
      return "/choirs/edit/" + choir.id;
    },
    detail: function(id) {
      console.log("Click");
      this.$router.push("/choirs/detail/" + id);
    }
  }
};
</script>
