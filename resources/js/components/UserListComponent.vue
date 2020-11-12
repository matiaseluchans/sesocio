<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <strong>Consulta</strong> de {{ moduleTitle }}
          </div>
          <div class="card-body">
            <div class="row border" v-for="(user, iuser) in users" :key="iuser">
              <!--<pre>{{ calc.requestMount }}</pre>-->

              <div class="col-md-1">
                {{ user.id }}
              </div>
              <div class="col-md-3">
                {{ user.name }}
              </div>
              <div class="col-md-4">
                {{ user.email }}
              </div>
              <div class="col-md-2">
                <div class="col-md-6">
                  <div
                    class="btn btn-xs btn-success"
                    @click="modalForm(user.id)"
                    data-toggle="modal"
                    data-target="#modalForm"
                    data-keyboard="false"
                  >
                    ver
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <user-form-component></user-form-component>
  </div>
</template>

<script>
export default {
  name: "UserListComponent",
  editMode: false,
  mounted() {
    axios.get("/api/users").then((response) => {
      this.users = response.data;
    });
  },
  beforeDestroy() {
    Event.$off("refresh-table", this.refreshTable);
  },
  data() {
    let data = {
      moduleTitle: "Usuarios",
      moduleUri: "users",
      users: [],
      showForm: false,
      editMode: false,
    };

    return data;
  },
  methods: {
    refreshTable() {
      this.$refs.table.refresh();
    },

    modalForm(idedit = 0) {
      console.log(idedit);
      console.log(this.$children[0]);
      this.$children[0].loadData(idedit);
    },
  },
};
</script>

<style scoped>
</style>
