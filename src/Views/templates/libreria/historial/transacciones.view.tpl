<table>
  <thead>
    <tr>
      <th>Transacción ID</th>
      <th>Usuario</th>
      <th>Fecha</th>
      <th>Monto</th>
      <th>Estado</th>
    </tr>
  </thead>
  <tbody>
    {{foreach transacciones}}
    <tr>
      <td>{{transaccionId}}</td>
      <td>{{usercod}}</td>
      <td>{{fecha}}</td>
      <td>{{monto}}</td>
      <td>{{estado}}</td>
    </tr>
    {{endfor transacciones}}
  </tbody>
</table>
