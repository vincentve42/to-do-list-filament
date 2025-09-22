<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TodoResource\Pages;
use App\Filament\Resources\TodoResource\RelationManagers;
use App\Models\Todo;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TodoResource extends Resource
{

    protected static ?string $pluralModelLabel = 'Task';

    protected static ?string $model = Todo::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    

    protected static ?string $slug = 'task';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('keterangan')->label('Keterangan'),
                DateTimePicker::make('batas'),



            ]);
    }
    public static function getEloquentQuery() : Builder
    {
        
        return parent::getEloquentQuery()->where('user_id',Auth::id());
    }
   
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('ID'),
                TextColumn::make('keterangan')->label('Keterangan'),
                SelectColumn::make('status')->options(['Ongoing' => 'Ongoing','Completed' => 'Completed','Not Completed' => 'Not Completed','Late Completed' => 'Late Completed'])
            ])
            
            ->filters([
                SelectFilter::make('status')->options(['Ongoing' => 'Ongoing','Completed' => 'Completed','Not Completed' => 'Not Completed','Late Completed' => 'Late Completed'])
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label('Buat Tugas')->modelLabel('Buat Tugas'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTodos::route('/'),
            'create' => Pages\CreateTodo::route('/create'),
            'edit' => Pages\EditTodo::route('/{record}/edit'),
        ];
    }
}
