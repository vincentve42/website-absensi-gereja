<?php

namespace App\Filament\Resources;

use App\Filament\Exports\JemaatExporter;
use App\Filament\Imports\JemaatImporter;
use App\Filament\Resources\JemaatResource\Pages;
use App\Filament\Resources\JemaatResource\RelationManagers;
use App\Models\Jemaat;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JemaatResource extends Resource
{
    protected static ?string $model = Jemaat::class;

    protected static ?string $navigationGroup = 'Jemaat';

    

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $pluralModelLabel = 'Jemaat';
    
    protected static ?string $slug = 'jemaat';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_jemaat')->label('Nama Jemaat')->required(),
                TextInput::make('alamat_jemaat')->label('Alamat Jemaat')->required(),
                TextInput::make('nomor_telepon')->label('Nomor Telepon')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('nama_jemaat')->label('Nama Jemaat')->searchable()->sortable(),
                TextColumn::make('alamat_jemaat')->label('Alamat Jemaat')->searchable(),
                TextColumn::make('nomor_telepon')->label('Nomor Telepon')->searchable()
            ])
            ->filters([
                //
            ])
            
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
            ])
            ->headerActions([
                \Filament\Tables\Actions\ExportAction::make()->exporter(JemaatExporter::class),
                \Filament\Tables\Actions\ImportAction::make()->importer(JemaatImporter::class)
                
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
            'index' => Pages\ListJemaats::route('/'),
            'create' => Pages\CreateJemaat::route('/create'),
            'edit' => Pages\EditJemaat::route('/{record}/edit'),
        ];
    }
}
