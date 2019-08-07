{{csrf_field()}}
        <input type="hidden" name="client_type" value="{{$clientType}}">
        <div class="form-group">
            <label for="name">Nome</label>
            <input class="form-control" id="name" name="name" value="{{old('name',$client->name)}}"> 
        </div>

        <div class="form-group">
            <label for="document_number">Documento</label>
            <input class="form-control" id="document_number" name="document_number" value="{{old('document_number',$client->document_number)}}">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" id="email" name="email" type="email" value="{{old('email',$client->email)}}">
        </div>

        <div class="form-group">
            <label for="phone">Telefone</label>
            <input class="form-control" id="phone" name="phone" value="{{old('phone',$client->phone)}}">
        </div>
        @if($clientType == \App\Client::TYPE_INDIVIDUAL)
        <div class="form-group">
            <label for="marital_status">Estado civil</label>
            <select class="form-control" name="marital_status" id="marital_status" value="$client->marital_status>
                <option value="">Selecione o estado civil</option>
                <option value="1" {{old('marital_status',$client->marital_status) == 1?'selected="selected"' : ''}}>Solteiro</option>
                <option value="2" {{old('marital_status',$client->marital_status) == 2?'selected="selected"' : ''}}>Casado</option>
                <option value="3" {{old('marital_status',$client->marital_status) == 3?'selected="selected"' : ''}}>Divorciado</option>
            </select>
        </div>

        <div class="form-group">
            <label for="date_birth">Data Nasc.</label>
            <input class="form-control" id="date_birth" name="date_birth" type="date" value="{{old('date_birth',$client->date_birth)}}">
        </div>

        <div class="radio">
            <label>
                <input type="radio" name="sex" value="m" {{old('sex',$client->sex) == 'm'?'checked="checked"' : ''}}> Masculino
            </label>
        </div>

        <div class="radio">
            <label>
                <input type="radio" name="sex" value="f" {{old('sex',$client->sex) == 'f'?'checked="checked"' : ''}}> Feminino
            </label>
        </div>

        <div class="form-group">
            <label for="physical_desability">Deficiência Fisica</label>
            <input class="form-control" id="physical_desability" name="physical_desability" value="{{old('physical_desability',$client->physical_desability)}}">
        </div>
        @else
            <div class="form-group">
                <label for="company_name">Nome Fantasia</label>
                <input class="form-control" id="company_name" name="company_name" value="{{old('company_name',$client->company_name)}}"> 
            </div>
        @endif
        <div class="checkbox">
            <label>
                <input id="defaulter" name="defaulter" type="checkbox" {{old('defaulter',$client->defaulter) ? 'checked="checked"' : ''}}> Inadimplente?
            </label>        
        </div>