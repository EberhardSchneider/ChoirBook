<template>
     <div>
        <v-toolbar color="pink">
            <v-toolbar-title class="white--text">
                MY CHOIRS
            </v-toolbar-title>
            <v-spacer></v-spacer>
            <v-btn icon><v-icon>search</v-icon></v-btn>
        </v-toolbar>
        <v-card>
            <v-container fluid style="min-height: 0;" class="" grid-list-kg>
                <v-layout row wrap>
                    <v-flex xs12 v-for="choir in getChoirs" :key="choir.id" class="mt-3">
                        <v-card color="blue-grey darken-2" class="white--text">
                            <v-card-title primary-title>
                                <div>
                                    <div class="headline">{{ choir.name }}</div>
                                    <div>{{ choir.description }}</div>
                                </div>
                            </v-card-title>
                        </v-card>
                    </v-flex>
                </v-layout>
            </v-container>
        </v-card>
    </div>
</template>

<style>
</style>

<script>
const self = this;

export default {
  props: {
    type: String
  },
  computed: {
    getChoirs() {
      console.log("GetChoirs:");
      console.log(self.default.props.type);
      return this.$store.state.choirsMember;
    }
  }
};
</script>
