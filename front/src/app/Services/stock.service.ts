import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { IStock } from '../Interfaces/IStock';
@Injectable({
  providedIn: 'root'
})
export class StockService {
  private urlBase: string =
  'http://localhost/Sexto_PHP_ANGULAR1/Inventario/Controllers/Stock.Controller.php?op=';
constructor(private clientePhp: HttpClient) {}
todos(): Observable<IStock[]> {
  return this.clientePhp.get<IStock[]>(this.urlBase + 'todos');
}
insertar(stock: IStock): Observable<any> {
  var prov = new FormData();
  prov.append('Nombres', stock.Nombres);
  prov.append('Telefono', stock.Telefono);
  prov.append('Correo', stock.Correo);  
  return this.clientePhp.post(this.urlBase + 'insertar', prov);
}
eliminar(id: number): Observable<any> {
  var prov = new FormData();
  prov.append('stockId', id.toString());
  return this.clientePhp.post(this.urlBase + 'eliminar', prov);
}
uno(id: number): Observable<IStock> {
  var prov = new FormData();
  prov.append('stockId', id.toString());
  return this.clientePhp.post<IStock>(this.urlBase + 'uno', prov);
}
actualizar(stock: IStock, id: number): Observable<any> {
  var prov = new FormData();
  prov.append('stockId', id.toString());
  prov.append('Nombres', stock.Nombres);
  prov.append('Telefono', stock.Telefono);
  prov.append('Correo', stock.Correo);
  return this.clientePhp.post(this.urlBase + 'actualizar', prov);
}
}
