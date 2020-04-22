    <template>
  <div>
    <div class="form-inline">
      <modal-link name="register" css="btn btn-light" title="Cadastrar"></modal-link>
      <div class="form-group pull-right">
        <input type="search" class="form-control" placeholder="Buscar" v-model="buscar" >
      </div>
    </div>

    <table class="table table-hover">
      <thead>
        <tr>
          <th class="text-center" v-for="(title, key) in titles" :key="key">{{title}}</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(item,index,key) in lista" :key="key">
          <td class="text-center" v-for="(i, key) in item" :key="key">{{i}}</td>

          <td>
            <form v-bind:id="index" v-bind:action="deletar + item.id" method="post">
              <input type="hidden" name="_method" value="DELETE" />
              <input type="hidden" name="_token" v-bind:value="token" />
              <modal-link css="btn btn-light"  name="detalhe" v-bind:item="item" v-bind:url="detalhe" title="Detalhe"></modal-link>
              <modal-link css="btn btn-light"  name="editar" v-bind:item="item" v-bind:url="editar" title="Editar"></modal-link>
              <button class="btn btn-outline-danger" href="#" v-on:click="exeForm(index)">Deletar</button>
            </form>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  props: ["titles", "itens", "criar", "detalhe", "editar", "deletar", "token"],
  data: function() {
    return {
      buscar: ""
    };
  },
  methods: {
    exeForm: function(index) {
      document.getElementById(index).submit();
    }
  },
  computed: {
    lista: function() {
      if (this.buscar) {
        return this.itens.filter(res => {
          res = Object.values(res);
          for (let k = 0; k < res.length; k++) {
            if (
              (res[k] + "").toLowerCase().indexOf(this.buscar.toLowerCase()) >=
              0
            ) {
              return true;
            }
          }
          return false;
        });
      }
      return this.itens;
    }
  }
};
</script>